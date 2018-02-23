<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        return view('blogs.frontend');
    }

    public function backend()
    {
        return view('blogs.backend');
    }
    
    public function create()
    {
        return view('blogs.create');
    }
    
    public function store()
    { 
        
        //Create a new post using the request data
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
       
        // Save it to the database
        $post->save();

        // And then redirect to the homepage
        return redirect('/');

    }

}
