<?php

namespace App\Http\Controllers\Customer\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\profile\ProfileRequest;

class AccountProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = User::where('id', auth()->user()->id)
                ->where('status', 1)
                ->first();

            return view('customer.profile.my-profile', compact('user'));
        } else {
            return to_route('auth.customer.login-register-form');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::check()) {
            return view('customer.profile.edit-profile', compact('user'));
        } else {
            return to_route('auth.customer.login-register-form');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        if (Auth::check()) {
            $inputs = $request->all();
            
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

            if (isset($inputs['email'])) {
                $inputs['email'] = convertPersianToEnglish($inputs['email']);
            }
            
            $inputs['national_code'] = convertPersianToEnglish($inputs['national_code']);


            // set slug for user info
            if (isset($inputs['first_name']) && isset($inputs['last_name'])) {
                $inputs['slug'] = str_replace(' ', '-', $inputs['first_name']) . '-' . str_replace(' ', '-', $inputs['last_name']);
            }

            $user->update($inputs);


            return to_route('customer.profile.my-profile')->with('swal-success', 'پروفایل  شما با موفقیت ویرایش شد');
        } else {
            return to_route('auth.customer.login-register-form');
        }
    }
}
