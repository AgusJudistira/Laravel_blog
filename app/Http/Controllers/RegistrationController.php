<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function create()
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = Array();

        return view('registrations.create', compact('cat_link', 'blogs_withcats'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        //$request['password'] = bcrypt($request['password']);

        $user = \App\User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->home();
    }
}
