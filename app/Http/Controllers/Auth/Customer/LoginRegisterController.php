<?php

namespace App\Http\Controllers\Auth\Customer;

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Setting\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {
        return view('customer.auth.login-register');
    }


    public function LoginRegister(LoginRegisterRequest $request)
    {

        $inputs = $request->all();

        if (isset($inputs['mobile'])) {
            $type = 0; // 0 => mobile;
            // filter mobile format
            $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
            $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
            $user_login_id = $inputs['mobile'];

            $user = User::where('mobile', $inputs['mobile'])->first();
            if (empty($user)) {
                $newUser['mobile'] = $inputs['mobile'];
            } else {
                $checkNoAdmin = $user->user_type == 1 ? true : false;
                if ($checkNoAdmin) {
                    return to_route('auth.customer.login-register-form');
                }
            }
        } elseif (isset($inputs['email']) && filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user_login_id = $inputs['email'];
            $user = User::where('email', $inputs['email'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['email'];
            } else {
                $checkNoAdmin = $user->user_type == 1 ? true : false;
                if ($checkNoAdmin) {
                    return to_route('auth.customer.login-register-form');
                }
            }
        }



        // check user login or register
        if (empty($user)) {
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
            $newUser['status'] = 1;
            $user = User::create($newUser);
        }


        // create OTP code
        $otpCode = rand(111111, 999999);
        $token = Str::random(60);

        $login_id = (isset($inputs['mobile'])) ? $inputs['mobile'] : $inputs['email'];

        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $login_id,
            'type' => $type
        ];

        Otp::create($otpInputs);

        $webTitle = Setting::where('status', 1)->orderBy('id', 'asc')->first('title') ?? 'وب سایت فروشگاهی';

        if ($type === 0) {
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo([$user->mobile]);
            $smsService->setText("$webTitle->title \n کد تایید: $otpCode");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
        } elseif ($type === 1) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'DigiKala');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['email']);

            $messageService = new MessageService($emailService);
        }

        $messageService->send();


        return to_route('auth.customer.login-confirm-form', $token);
    }






    public function LoginConfirmForm($token)
    {
        // check token
        $tiken = checkToken($token);

        $user_login_id = '';
        if (!empty($token)) {
            if (preg_match('/^[0-9a-zA-Z]/', $token)) {
                $user_login_id = Otp::where('token', $token)->get(['login_id', 'type'])->first();
            }
            if (!$user_login_id) {
                return to_route('auth.customer.login-register')->with('alert-section-error', 'آدرس وارد شده نا معتبر می باشد');
            }
        } else {
            return to_route('auth.customer.login-register')->with('alert-section-error', 'آدرس وارد شده نا معتبر می باشد');
        }
        return view('customer.auth.login-confirm', compact('user_login_id', 'token'));
    }





    public function LoginConfirm($token, LoginRegisterRequest $request)
    {
        // check token
        $tiken = checkToken($token);
        $inputs = $request->all();

        $otp = '';
        if (!empty($token)) {
            if (preg_match('/^[0-9a-zA-Z]/', $token)) {
                $otp = Otp::where('token', $token)
                    ->where('used', 0)
                    ->where('created_at', '>=', Carbon::now()->subMinute(3)->toDateTimeString())
                    ->first();
            }

            // if not found this token on otp table
            if (empty($otp)) {
                return to_route('auth.customer.login-confirm', $token)->withErrors(['token-error' => 'کد مورد نظر منتقی شده است لطفاً کد جدید دریافت کنید']);
            }

            // if otp not match
            if ($otp->otp_code !== $inputs['otp']) {
                return to_route('auth.customer.login-confirm', $token)->withErrors(['otp-error' => 'کد وارد شده صحیح نمی باشد']);
            }

            // if everything is ok:
            $otp->update(['used' => 1]);

            // access to user
            $user = $otp->user()->first();

            if ($otp->type == 0 && empty($user->mobile_verified_at)) {
                $user->update(['mobile_verified_at' => Carbon::now()]);
            } elseif ($otp->type == 1 && empty($user->email_verified_at)) {
                $user->update(['email_verified_at' => Carbon::now()]);
            }

            session()->regenerate();

            Auth::login($user);

            if ($user->checkNotCompletionProfile()) {
                return to_route('customer.profile.my-profile');
            } else {
                return to_route('customer.home');
            }
        }
    }




    public function LoginResendCode($token)
    {
        // check token
        $token = checkToken($token);
        if (!empty($token)) {
            if (preg_match('/^[0-9a-zA-Z]/', $token)) {
                $user_login_id = Otp::where('token', $token)->first();
            }
            if ($user_login_id) {
                // create new OTP code
                $otpCode = rand(111111, 999999);

                // update OTP code in user otp data
                $user_login_id->otp_code = $otpCode;
                $user_login_id->used = 0;
                $user_login_id->save();

                $webTitle = Setting::where('status', 1)->orderBy('id', 'asc')->first('title');


                if ($user_login_id->type === 0) {
                    // send sms
                    $smsService = new SmsService();
                    $smsService->setFrom(Config::get('sms.otp_from'));
                    $smsService->setTo([$user_login_id->login_id]);
                    $smsService->setText("$webTitle->title \n کد تایید: $otpCode");
                    $smsService->setIsFlash(true);

                    $messageService = new MessageService($smsService);
                } elseif ($user_login_id->type === 1) {
                    // send emial
                    $emailService = new EmailService();
                    $details = [
                        'title' => 'ایمیل فعال سازی',
                        'body' => "کد فعال سازی شما : $otpCode"
                    ];
                    $emailService->setDetails($details);
                    $emailService->setFrom('noreply@example.com', 'DigiKala');
                    $emailService->setSubject('کد احراز هویت');
                    $emailService->setTo($user_login_id->login_id);
                    $messageService = new MessageService($emailService);
                }
                $result = $messageService->send();

                if ($result) {
                    return response()->json(['resend' => true]);
                } else {
                    return response()->json(['resend' => false]);
                }
            }
        }
    }

    public function Logout()
    {
        session()->invalidate();
        Auth::logout();

        return back();
    }
}
