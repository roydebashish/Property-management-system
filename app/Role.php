<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description'];
    //accessor to capitalize role name
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    //many-to-many relationship between Role and User.
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
