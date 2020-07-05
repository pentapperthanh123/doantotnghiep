<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = [
    	'name', 'desc', 'status','rooms_id'
    ];

    public function devices(){
    	return $this->hasMany('App\Models\Device', 'computers_id');
    }

    public function room(){
    	return $this->belongsTo('App\Models\Room', 'rooms_id', 'id');
    }
}
