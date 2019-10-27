<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //many-to-many relationship between Role and User.
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
