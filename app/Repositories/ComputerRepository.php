<?php

namespace App\Repositories;

use App\Models\Computer;
use App\Http\Resources\ComputerResource;

class ComputerRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return ComputerResource::collection(Computer::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new ComputerResource(Computer::create($request->all()));
    }

    public function update($request,$id){
    	$computer = Computer::findOrFail($id);
    	$computer->update($request->only(['name','desc','status','rooms_id']));
    	return new ComputerResource($computer);
    }

    public function destroy($id){
    	$computer = Computer::findOrFail($id);
    	$computer->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new ComputerResource(Computer::with(['devices', 'room'])->findOrFail($id));
    }
}
