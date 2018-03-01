<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    public $timestamps = false;
    
    protected $primaryKey = 'cat_id';


    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
