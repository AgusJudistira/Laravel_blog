<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

}
