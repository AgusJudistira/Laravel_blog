<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show()
    {   
        $categories = Category::all();

        return view('categories', compact('categories'));
    }
}
