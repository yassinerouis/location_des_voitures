<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_posts extends Model
{
    public function comments(){
        return $this->hasMany('App\Blog_comments');
    }
}
