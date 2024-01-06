<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ProfileCompletionRequest;
use App\Models\Market\CartItem;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function profileCompletion()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::where('user_id', $user->id)->get();
            return view('customer.sales-process.profile-completion', compact('user', 'cartItems'));
        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }


    public function ProfileUpdate(ProfileCompletionRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $inputs = $request->all();

            // strat validation check
            // has mobile
            if (isset($inputs['mobile'])) {
                // filter mobile format
                $inputs['mobile'] = "0" . preg_replace('/[^0-9]/', '', $inputs['mobile']);
                $inputs['mobile'] = substr($inputs['mobile'], 0, 2) === '98' ? substr($inputs['mobile'], 2) : $inputs['mobile'];
                $inputs['mobile'] = convertPersianToEnglish($inputs['mobile']);

                $has_user = User::where('mobile', $inputs['mobile'])->first();
                if (!empty($has_user)) {
                    return back()->with('alert-section-error', 'شماره موبایل وارد شده قبلاً در سیستم ثبت شده است');
                }
            }
            // incorect email
            if (isset($inputs['email']) && !filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
                return back()->with('alert-section-error', 'ایمیل وارد شده نا معتبر می باشد');
            }
            if(isset($inputs['email'])){
                $inputs['email'] = convertPersianToEnglish($inputs['email']);
            }
            // end validation check

            // set slug for user info
            if(isset($inputs['first_name']) && isset($inputs['last_name'])){
                $inputs['slug'] = str_replace(' ', '-', $inputs['first_name']) . '-' . str_replace(' ', '-', $inputs['last_name']);
            }

            $user->update($inputs);


            return redirect()->route('customer.sales-process.address-and-delivery');

        } else {
            return redirect()->route('auth.customer.login-register-form');
        }
    }
}
