<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
 	protected $fillable = ['value', 'devices_id'];
}
