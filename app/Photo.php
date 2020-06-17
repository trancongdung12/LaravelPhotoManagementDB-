<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    function description(){
        return $this->hasOne('App\PhotoDescription','id','id');
    }
    function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    function tag(){
        return $this->belongsToMany('App\Tag','taggables','photo_id','tag_id');
    }
}
