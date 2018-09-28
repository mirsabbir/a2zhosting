<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();

        unset($array['body']);

        return $array;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


}
