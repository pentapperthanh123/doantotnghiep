<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model
{
	protected $table = 'type_devices';
    protected $fillable = ['name'];
}
