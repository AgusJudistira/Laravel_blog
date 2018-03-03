<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{

    public function index() // als gebruiker naar root gaat
    {        
        $cat_link = \App\Category::all();
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
        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }

        
    public function show_sort_cat($cat_id)
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = \App\Category::find($cat_id)->blogs()->latest()->get();

        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }


    public function backend()
    {           
        $categories = \App\Category::all();

        $blogs_withcats = Blog::with('categories')->latest()->get();
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }


    public function show_blog_detail($blog_id) 
    {
        $blog_id = intval($blog_id);

        $categories = \App\Category::all();
        $blog = Blog::find($blog_id);
        $list_of_comments = $blog->comments()->get();
    
        //dd($list_of_comments);

        return view('blogs.edit', compact('blog', 'categories', 'list_of_comments'));
    }

    public function delete_comment($blog_id, $comment_id) 
    {        
        $comment = \App\Comments::find($comment_id);
        $comment->forceDelete();

        $blog = Blog::find($blog_id); //->with('categories'); //->get();
        $categories = $blog->categories()->get();

        //$comment = new \App\Comments;
        //$comment->blog_id = $blog->id;
        //$comment->comment = request('commentaar');
        //$comment->save();

        $list_of_comments = $blog->comments()->get();

        return view('blogs.edit', compact('blog', 'categories', 'list_of_comments'));
    }

    public function store_blog_detail($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog->save();

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
        
        $blog->categories()->attach($cat_id);

        $categories = \App\Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
        //return view('blogs.backend');
        //return redirect('backend');
    }

    public function fullblog($blog_id) 
    {
        $blog = Blog::find($blog_id);
        $categories = $blog->categories()->get();
        $list_of_comments = $blog->comments()->get();
        //dd($comments);

        return view('blogs.fullblog', compact('blog', 'categories', 'list_of_comments'));
    }

    public function store_comment($blog_id) 
    {
        $blog = Blog::find($blog_id); //->with('categories'); //->get();
        $categories = $blog->categories()->get();

        $comment = new \App\Comments;
        $comment->blog_id = $blog->id;
        $comment->comment = request('commentaar');

        $comment->save();

        $list_of_comments = $blog->comments()->get();

        return view('blogs.fullblog', compact('blog', 'categories', 'list_of_comments'));
    }
    

}
