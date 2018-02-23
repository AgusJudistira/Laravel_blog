<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function index() // als gebruiker naar root gaat
    {
        return view('blogs.frontend');
    }

    public function backend() // als gebruiker naar '/backend' gaat
    {
        return view('blogs.backend');
    }

    public function detail() // als gebruiker naar '/backend/detail' gaat
    {
        return view('blogs.backend.detail');
    }

    public function store() // als gebruiker blog formulier in /backend submit
    {
        //dd(request(["titel", "artikel"]));
        $blog = new Blog;
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $blog->save();

        return redirect('/backend');
    }
    
}
