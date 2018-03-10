<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class FrontendController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index() // als gebruiker naar root gaat
    {
        /*
        $month_link = Blog::selectRaw('MONTH(created_at) as maandnummer, MONTHNAME(created_at), YEAR(created_at), COUNT(*) GROUP BY maandnummer')
//        ->groupBy('maandnummer')
        ->latest()->limit(12)->toSql();//->get();
        //ORDER BY created_at DESC LIMIT 12')->get();
        //->groupby('month(created_at)')->raw('monthname(created_at) as monthname')->latest()->get();
        dd($month_link);*/
        $cat_link = Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();
        
        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }

    public function show_sort_month()
    {

    }
        
    public function show_sort_cat($cat_id)
    {
        $cat_link = \App\Category::all();
        $blogs_withcats = \App\Category::find($cat_id)->blogs()->latest()->get();

        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
    }

    public function zoeken()
    {
        $cat_link = \App\Category::all();
        $zoekstring = "%" . request('zoekstring') . "%";

        $blogs_withcats = \App\Blog::with('categories')
                            ->where('titel', 'LIKE', $zoekstring)
                            ->orWhere('artikel', 'LIKE', $zoekstring)
                            ->latest()->get();

        return view('blogs.frontend', compact('blogs_withcats', 'categories', 'cat_link'));
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
