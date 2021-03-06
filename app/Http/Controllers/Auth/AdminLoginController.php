<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Auth;
use App\Blog;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = Array();
        $categories = Array();
        return view('auth.admin-login', compact('cat_link', 'blogs_withcats', 'categories'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)) {            
            //login successful
            return redirect()->intended(route('backend'));
        }
        //login fails
        //dd($request->password);

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->home();
    }

}
