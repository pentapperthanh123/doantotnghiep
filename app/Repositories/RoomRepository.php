<?php

namespace App\Repositories;

use App\Models\Room;
use App\Http\Resources\RoomResource;

class RoomRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return RoomResource::collection(Room::orderBy('id','DESC')->get());
    }

    public function store($request){
        return new RoomResource(Room::create($request->all()));
    }

    public function update($request,$id){
        $rooms = Room::findOrFail($id);
        $rooms->update($request->only(['name','desc','status']));
        return new RoomResource($rooms);
    }

    public function destroy($id){
        $rooms = Room::findOrFail($id);
        $rooms->delete();
        return response()->json(null,204);
    }

    public function show($id){
        return new RoomResource(Room::with('computers')->findOrFail($id));
    }
}
