<?php

namespace App\Repositories;

use App\Models\Device;
use App\Http\Resources\DeviceResource;

class DeviceRepository
{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function all(){
        return DeviceResource::collection(Device::orderBy('id','DESC')->get());
    }

    public function store($request){
    	return new DeviceResource(Device::create($request->all()));
    }

    public function update($request,$id){
    	$device = Device::findOrFail($id);
    	$device->update($request->only(['name','desc','status', 'computers_id','type_devices_id']));
    	return new DeviceResource($device);
    }

    public function destroy($id){
    	$device = Device::findOrFail($id);
    	$device->delete();
    	return response()->json(null,204);
    }

    public function show($id){
    	return new DeviceResource(Device::findOrFail($id));
    }
}
