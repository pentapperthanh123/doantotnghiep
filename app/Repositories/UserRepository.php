<?php

namespace App\Repositories;

use App\User;
use App\Http\Resources\UserResource;

class UserRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return UserResource::collection(User::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new UserResource(User::create($request->all()));
    }

    public function update($request,$id){
    	$user = User::findOrFail($id);
    	$user->update($request->only(['username','email','password','name','role']));
    	return new UserResource($user);
    }

    public function destroy($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new UserResource(User::findOrFail($id));
    }
}
