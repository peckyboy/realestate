<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    public function properties(){
        return $this->hasMany(Property::class);
    }
}
