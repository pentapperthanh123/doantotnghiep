<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RoomResource extends Resource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'computers' => $this->computers,
        ];
    }
}