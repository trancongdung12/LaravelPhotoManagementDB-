<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function photo(){
        return $this->hasMany("App\Photo","category_id","id");
    }

}
