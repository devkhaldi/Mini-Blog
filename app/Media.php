<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['file'] ;
    public function post() {
        return $this->belongsTo('App/Post') ;
    }
}
