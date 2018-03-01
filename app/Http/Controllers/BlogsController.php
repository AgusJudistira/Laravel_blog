<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{
    public function index() // als gebruiker naar root gaat
    {
        $blogs_withcats = Blog::with('categories')->latest()->get();

        //$blogs_withcats = Category::findOrFail(1)->blogs()->latest()->get();
        
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

        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }

    public function show_blog_detail($blog_id) // als admin naar '/backend/detail' gaat
    {
        $blog_id = intval($blog_id);
        $categories = \App\Category::all();
        
        $blog = Blog::find($blog_id);
    
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function store_blog_detail($blog_id) // als admin een blog in /backend wijzigt en submit
    {
        //dd(request(["titel", "artikel"]));
        $blog = Blog::find($blog_id);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog->save();

        if ($blog->categories()->where('blog_categories.cat_id', $cat_id)->first() != true) {
            // Categorie toegevoen. Anders niet omdat het al bij de categorie hoort.
            $blog->categories()->attach($cat_id);
        }

        //return view('blogs.backend');
        return redirect('/backend');
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

    public function fullblog($blog_id) 
    {
        $blog = Blog::find($blog_id); //->with('categories'); //->get();
        $categories = $blog->categories()->get();
        $comments = $blog->comments()->get();

        return view('blogs.fullblog', compact('blog', 'categories', 'comments'));
    }

    public function storeComment($blog_id) 
    {
        $blog = Blog::find($blog_id); //->with('categories'); //->get();
        $comments = new \App\Comments;
        $comments->comment = request('commentaar');

        $blog->categories()->save();

        return view('blogs.fullblog', compact('blog', 'categories'));
    }
    
}
