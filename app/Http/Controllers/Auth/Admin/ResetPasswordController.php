<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showResetForm(Request $request)
    {
        return view('admin.auth.reset-password', [
            'email' => $request->query('email'),
            'token' => $request->query('token'),
        ]);
    }


    public function reset(Request $request)
    {
        $this->validateForm($request);


        $response =  Password::broker()->reset(

            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

    
        return $response === Password::PASSWORD_RESET
            ? redirect()->route('admin.auth.login')->with('swal-success', 'رمز عبور حساب شما با موفقیت تغییر یافت')
            : back()->with('cantChangePassword', true);
    }


    protected function validateForm($request)
    {
        $request->validate([
            'password' => ['required', 'unique:users', PasswordRules::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
            'email' => 'required|email|exists:users',
            'token' => 'required|string'
        ]);
    }


    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
}
