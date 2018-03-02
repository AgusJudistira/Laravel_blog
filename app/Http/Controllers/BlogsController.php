<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{

    public function show_sort_cat($cat_id)  //als gebruiker naar root gaat
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = Category::find($cat_id)->blogs()->latest()->get();
        

        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }

    public function index()
    {

        $cat_link = \App\Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();
        

        
        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }

    public function backend()
    {   
                
        $categories = Category::all();

        $blogs_withcats = Blog::with('categories')->latest()->get();
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }

    public function show_blog_detail($blog_id) 
    {
        $blog_id = intval($blog_id);
        $categories = \App\Category::all();
        
        $blog = Blog::find($blog_id);
    
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function store_blog_detail($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog-save();

        if ($blog->categories()->where('blog_categories.cat_id', $cat_id)->first() != true) {
            $blog->categories()->attach($cat_id);
        }

        return redirect('backend');
    }

    public function store() 
    {
        $blog = new Blog;
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog->save();

        $blog-categories()-attach($cat_id);

        return view('blogs.backend');
        return redirect('backend');
    }

    public function fullblog($blog_id) 
    {
        $blog = Blog::find($blog_id);
        $categories = $blog->categories()->get();
       
        return view('blogs.fullblog', compact('blog', 'categories'));
    }
    
}
