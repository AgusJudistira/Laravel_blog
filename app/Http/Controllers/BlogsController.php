<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function index() // als gebruiker naar root gaat
    {
        $blogs_withcats = Blog::with('categories')->latest()->get();

        /*
        dd($blogs_withcats);
        //return view('blogs.frontend', compact('blogs'));
        $blogs_withcats = \App\Blog_category::join("blogs", "id", "=", "blog_categories.blog_id")
        ->join("categories", "categories.cat_id", "=", "blog_categories.cat_id")
        ->orderBy("created_at","desc")
        ->groupBy("blogs.id")
        ->select("titel","created_at","artikel")
        ->selectRaw("GROUP_CONCAT(categories.category_name SEPARATOR ', ') as categories")
        ->get();        
        */
        return view('blogs.frontend', compact('blogs_withcats', 'categories'));
    }

    public function backend() // als gebruiker naar '/backend' gaat
    {   
        $categories = \App\Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();        

        /*
        $blogs_withcats = \App\Blog_category::join("blogs", "id", "=", "blog_categories.blog_id")
        ->join("categories", "categories.cat_id", "=", "blog_categories.cat_id")
        ->orderBy("created_at","desc")
        ->groupBy("blogs.id")
        ->select("blogs.id", "titel", "created_at", "artikel")
        ->selectRaw("GROUP_CONCAT(categories.category_name SEPARATOR ', ') as categories")
        ->get();        
        */
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }

    public function detail($blog_id) // als gebruiker naar '/backend/detail' gaat
    {
        $blog = Blog::where('id', $blog_id);
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
