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

    public function store() // als gebruiker blog formulier in /backend submit
    {
        //dd(request(["titel", "artikel"]));
        $category = new Category;
        $category->category_name = request('categorie');        
        $category->save();

        //return view('blogs.backend');
        return redirect('/create_cat');
    }

}
