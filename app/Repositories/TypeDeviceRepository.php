<?php

namespace App\Repositories;

use App\Models\TypeDevice;
use App\Http\Resources\TypeDeviceResource;

class TypeDeviceRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return TypeDeviceResource::collection(TypeDevice::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new TypeDeviceResource(TypeDevice::create($request->all()));
    }

    public function update($request,$id){
    	$typedevice = TypeDevice::findOrFail($id);
    	$typedevice->update($request->only(['name']));
    	return new TypeDeviceResource($typedevice);
    }

    public function destroy($id){
    	$typedevice = TypeDevice::findOrFail($id);
    	$typedevice->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new TypeDeviceResource(TypeDevice::findOrFail($id));
    }
}
