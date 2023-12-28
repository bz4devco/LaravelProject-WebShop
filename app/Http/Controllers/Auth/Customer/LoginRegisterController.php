<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use Illuminate\Support\Facades\Config;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {
        return view('customer.auth.login-register');
    }


    public function LoginRegister(LoginRegisterRequest $request)
    {
        
        $inputs = $request->all();
        
        if(isset($inputs['mobile'])){
            $type = 0; // 0 => mobile;
            // filter mobile format
            $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']); 
            $inputs['mobile'] = substr($inputs['mobile'], 0 , 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];

            $user = User::where('mobile', $inputs['mobile'])->first();
            if(empty($user)){
                $newUser['mobile'] = $inputs['mobile'];
            }
        }
        elseif(isset($inputs['email']) && filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)){
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['email'])->first();
            if(empty($user)){
                $newUser['email'] = $inputs['email'];
            }
        }


        
        // check user login or register
        if(empty($user)){
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
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
            'type' => 0
        ];

        Otp::create($otpInputs);

        // dd('ok');


        if($type === 0){
            // send sms
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo([$user->mobile]);
            $smsService->setText("فروشگاه اینترنتی دیجی کالا \n کد تایید: $otpCode");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
        }

        elseif($type === 1){
            $emailService = new EmailService();
           $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['email']);

            $messageService = new MessageService($emailService);
        }

        $messageService->send();

    }
}
