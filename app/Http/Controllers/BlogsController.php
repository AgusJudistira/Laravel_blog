<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{
    public function index() // als gebruiker naar root gaat
    {
        $blogs = Blog::latest()->get();
        $categories = Category::all();
        return view('blogs.frontend', compact('blogs','categories'));
    }


    public function backend() // als gebruiker naar '/backend' gaat
    {   
        $blogs = Blog::latest()->get();

        return view('blogs.backend', compact('blogs'));
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

        //return view('blogs.backend');
        return redirect('/backend');
    }
    
}
