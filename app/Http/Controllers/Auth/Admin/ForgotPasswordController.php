<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showForgetForm()
    {
        return view('admin.auth.forget-password');
    }


    public function sendResetLink(Request $request)
    {
        $this->validateForm($request);

        $userType = User::where('email', $request->email)
            ->where('user_type', 1)->first();

        if (!$userType) {
            return $this->sendForgetFailedResponse();
        }

        $response = Password::broker()->sendResetLink($request->only('email'));

        if($response === Password::RESET_LINK_SENT){
            return back()->with('resetLinkSend', true);
        }

        return back()->with('resetLinkFailed', true);
    }


    protected function validateForm($request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        //    check has admin type

    }

    protected function sendForgetFailedResponse()
    {
        return back()->with('wrongUserEmail', true);
    }
}
