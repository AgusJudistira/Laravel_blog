<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'cat_id';

    public $timestamps = false;

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

}
