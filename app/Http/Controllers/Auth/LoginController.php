<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/pendidikan';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login()
    {
        return view('/auth/login');
    }

    public function authentication(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect('/home');
        }
        else {
            return redirect('/auth/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
