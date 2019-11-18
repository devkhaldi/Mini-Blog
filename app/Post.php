<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function media() {
        return $this->hasMany('App\Media') ;
    }
    public function comments() {
        return $this->hasMany('App\Comment') ;
    }
    public function user() {
        return $this->belongsTo('App\User') ;
    }
    public function category() {
        return $this->belongsTo('App\Category') ;
    }
}
