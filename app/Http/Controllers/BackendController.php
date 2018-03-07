<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BackendController extends Controller
{

    public function backend()
    {           
        $categories = \App\Category::all();

        $blogs_withcats = Blog::with('categories')->latest()->get();
        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }


    public function show_blog_detail($blog_id) 
    {
        $blog_id = intval($blog_id);

        $category_menu = \App\Category::all();
        $blog = Blog::with('categories')->find($blog_id);
        
        $list_of_comments = $blog->comments()->get();

        return view('blogs.edit', compact('blog', 'category_menu', 'blog->categories', 'list_of_comments'));
    }

    public function delete_comment($blog_id, $comment_id) 
    {        
        $comment = \App\Comments::find($comment_id);
        $comment->forceDelete();

        $category_menu = \App\Category::all();
        $blog = Blog::with('categories')->find($blog_id);

        $list_of_comments = $blog->comments()->get();

        return view('blogs.edit', compact('blog', 'category_menu', 'blog->categories', 'list_of_comments'));
    }

    public function store_blog_detail($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        
        $this->validate(request(),[
            'titel' => 'required',
            'artikel' => 'required'
        ]);
        
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
        $this->validate(request(),[
            'titel' => 'required',
            'artikel' => 'required'
        ]);
        $blog->titel = request('titel');
        $blog->artikel = request('artikel');
        $cat_id = request('cat_id');
        $blog->commentaar_toegestaan = request('commentaar_toegestaan');
        $blog->save();
        
        $blog->categories()->attach($cat_id);

        $categories = \App\Category::all();
        $blogs_withcats = Blog::with('categories')->latest()->get();

        return view('blogs.backend', compact('blogs_withcats', 'categories'));
    }

}
