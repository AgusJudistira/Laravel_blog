<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{

    public function show_sort_cat($cat_id){

        $cat_link = Category::all();
        $blogs_withcats = Category::find($cat_id)->blogs()->latest()->get();
        
        //$blogs_withcats = Blog::with('categories')->where('cat_id', $cat_id)->latest()->get();
        // dd($blogs_withcats);
        return view('blogs.frontend', compact('blogs_withcats', 'categories',  'cat_link'));
    }

    // public function show_sort_month(){
        
    //     $cat_link = Category::all();
    //     $month_link = Blog::MONTHNAME();
    //     // dd($month_link);
    //     $blogs_withcats = Blog::whereMonth('created_at', '=', date('m'));
        
    //     return view('blogs.frontend', compact( '$cat_link', 'month_link'));
    // }

    public function index() // als gebruiker naar root gaat
    {

        $cat_link = Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();
        
        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }


    public function zoeken()
    {
        $cat_link = Category::all();
        $zoekstring = "%" . request('zoekstring') . "%";
        $blogs_withcats = \App\Blog::with('categories')
                            ->where('titel', 'LIKE', $zoekstring)
                            ->orWhere('artikel', 'LIKE', $zoekstring)
                            ->latest()->get();

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

        $category_menu = Category::all();
        $blog = Blog::with('categories')->find($blog_id);
        
        $list_of_comments = $blog->comments()->get();

        return view('blogs.edit', compact('blog', 'category_menu', 'blog->categories', 'list_of_comments'));
    }

    public function delete_comment($blog_id, $comment_id) 
    {        
        $comment = Comments::find($comment_id);
        $comment->forceDelete();

        $category_menu = Category::all();
        $blog = Blog::with('categories')->find($blog_id);

        $list_of_comments = $blog->comments()->get();

        return view('blogs.edit', compact('blog', 'category_menu', 'blog->categories', 'list_of_comments'));
    }

    public function store_blog_detail($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog->commentaar_toegestaan = intval(request('commentaar_toegestaan'));
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
        $blog->commentaar_toegestaan = request('commentaar_toegestaan');
        $blog->save();
        
        $blog->categories()->attach($cat_id);
        

        $categories = Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }

    public function fullblog($blog_id) 
    {
        $blog = Blog::find($blog_id);
        $categories = $blog->categories()->get();
        $list_of_comments = $blog->comments()->get();
 
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
