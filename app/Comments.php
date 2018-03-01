<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function blog() 
    {
        return $this->belongsTo(Blog::class);
    }
}
