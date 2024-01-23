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
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        return view('customer.sales-process.profile-completion', compact('user', 'cartItems'));
    }


    public function ProfileUpdate(ProfileCompletionRequest $request)
    {
        $user = Auth::user();

        isset($request->first_name) ? $inputs['first_name'] = $request->first_name : null;
        isset($request->last_name) ? $inputs['last_name'] = $request->last_name : null;
        isset($request->national_code) ? $inputs['national_code'] = $request->national_code : null;
        isset($request->mobile) ? $inputs['mobile'] = $request->mobile : null;
        isset($request->email) ? $inputs['email'] = $request->email : null;


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
        if (isset($inputs['email'])) {
            $inputs['email'] = convertPersianToEnglish($inputs['email']);
        }
        // end validation check

        // set slug for user info
        if (isset($inputs['first_name']) && isset($inputs['last_name'])) {
            $inputs['slug'] = str_replace(' ', '-', $inputs['first_name']) . '-' . str_replace(' ', '-', $inputs['last_name']);
        }

        $user->update($inputs);


        return to_route('customer.sales-process.address-and-delivery');
    }
}
