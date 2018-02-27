<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function index() // als gebruiker naar root gaat
    {
        $blogs = Blog::latest()->get();

        return view('blogs.frontend', compact('blogs'));
        //return view('blogs.frontend');
    }

    public function backend() // als gebruiker naar '/backend' gaat
    {   
        //$blogs = Blog::latest()->get();
        
        $categories = \App\Category::all();

        $blogs_withcats = \App\Blog_category::join("blogs", "id", "=", "blog_categories.blog_id")
        ->join("categories", "categories.cat_id", "=", "blog_categories.cat_id")
        ->orderBy("created_at","desc")
        ->groupBy("blogs.id")
        ->select("titel","created_at","artikel")
        ->selectRaw("GROUP_CONCAT(categories.category_name SEPARATOR ', ') as categories")
        ->get();
        

        return view('blogs.backend', compact('blogs_withcats'), compact('categories'));
        //return view('blogs.backend', compact('blogs', 'categories'));
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
        $cat_id = request('cat_id');
        $blog->save();

        $blog->categories()->attach($cat_id);

        //return view('blogs.backend');
        return redirect('/backend');
    }
    
}
