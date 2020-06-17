<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable = ['user_id', 'title', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function catpost()
    {
        return $this->hasMany(Categorypost::class);
    }
}
