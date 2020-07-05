<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name', 'desc', 'status', 'computers_id','type_devices_id'];
    
    public function computer(){
    	return $this->belongsTo('App\Models\Computer', 'computers_id');
    }

    public function typeDevice(){
    	return $this->belongsTo('App\Models\TypeDevice', 'type_devices_id');
    }

}
