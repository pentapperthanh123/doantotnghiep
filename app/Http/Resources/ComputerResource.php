<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ComputerResource extends Resource
{
	/**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
    	return [
    		'id' => $this->id,
    		'name' => $this->name,
    		'desc' => $this->desc,
    		'status' => $this->status,
            'rooms_id' => $this->rooms_id,
            'devices' => $this->devices,
            'room' => $this->room,
    	];
    }
}