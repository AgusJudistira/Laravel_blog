<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    public function showLoginForm()
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = Array();
        $categories = Array();
        
        //dd($cat_link);

        return view('auth/user-login', compact('cat_link', 'blogs_withcats', 'categories'));
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::guard('web')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)) {            
            //login successful
            return redirect()->intended(route('frontend'));
        }
        //login fails
        //dd($request->password);

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect()->home();
    }
}
