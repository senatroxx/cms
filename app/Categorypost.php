<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorypost extends Model
{
    protected $table = 'category_post';

    protected $fillable = ['post_id', 'category_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
