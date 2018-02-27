<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show()
    {   
        $categories = Category::all();

        return view('blogs.create_cat', compact('categories'));
    }

    public function create_cat_menu()
    {
        $categories = Category::all();

        return view('blogs.posts.invoer', compact('categories'));
    }

    public function store() // als administrator blog formulier in /backend submit
    {
        //dd(request(["titel", "artikel"]));
        $category = new Category;
        $category->category_name = request('categorie');        
        $category->save();

        //return view('blogs.backend');
        return redirect('/create_cat');
    }

}
