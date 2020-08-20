<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
