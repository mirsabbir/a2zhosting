<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function drafts()
    {
        return $this->hasMany('App\Draft');
    }

    public function latestPosts()
    {
        return $this->hasMany('App\Post')->latest();
    }
    public function popularPosts()
    {
        return $this->hasMany('App\Post')->orderBy('count', 'desc');
    }
}
