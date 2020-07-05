<?php

namespace App\Repositories;

use App\Models\Tasks;
use App\Http\Resources\TaskResource;

class TaskRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return TaskResource::collection(Tasks::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new TaskResource(Tasks::create($request->all()));
    }

    public function update($request,$id){
    	$task = Tasks::findOrFail($id);
    	$task->update($request->only(['name']));
    	return new TaskResource($task);
    }

    public function destroy($id){
    	$task = Tasks::findOrFail($id);
    	$task->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new TaskResource(Tasks::findOrFail($id));
    }
}
