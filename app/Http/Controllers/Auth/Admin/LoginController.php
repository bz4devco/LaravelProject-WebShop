<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;


class LoginController extends Controller
{
    protected $twoFactor;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use ThrottlesLogins;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
        $this->validateForm($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if ($this->attempLogin($request)) {
            return $this->sendSuccessResponse();
        }

        $this->incrementLoginAttempts($request);

        return $this->sendLoginFailedResponse();
 
    }


    protected function attempLogin(Request $request)
    {
        return  Auth::attempt($request->only('email', 'password'), $request->filled('remember'));
    }

    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials', true);
    }

    protected function isValidCredentials($request)
    {
    }


    protected function sendSuccessResponse()
    {
        session()->regenerate();
        return to_route('admin.home');
    }

    public function confirmCode()
    {
    }


    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string',
        ]);
    }

    protected function getUser($request)
    {
    }

    public function logout()
    {
        session()->invalidate();

        Auth::logout();

        return to_route('admin.auth.login.form');
    }


    protected function username()
    {
        return 'email';
    }
}
