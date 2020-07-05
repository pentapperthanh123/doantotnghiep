<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{   
    protected $fillable = ['name', 'desc', 'status'];

    public function computers(){
    	return $this->hasMany('App\Models\Computer', 'rooms_id');
    }
}
