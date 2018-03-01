<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // $comment->post;
    public function blog(){

        return $this->belongsTo(Blog::class);
    }
}
