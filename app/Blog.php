<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories', 'blog_id', 'cat_id');
    }
}
