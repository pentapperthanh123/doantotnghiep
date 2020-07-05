<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DeviceRepository;
use App\Http\Requests\DevicesStoreRequest;
use App\Http\Requests\DevicesUpdateRequest;


class DeviceController extends BaseController
{
    private $repository;
    public function __construct(DeviceRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        // $deviceList = DB::table('devices')->orderBy('id','DESC')->get();
        // return api_success(['data' => $deviceList],200);
        return $this->repository->all();
    }

    public function store(DevicesStoreRequest $request)
    {
        // $devices = Device::create($request->all());
        // return api_success(['data' => $devices], 200);
        return $this->repository->store($request);
    }

    public function update(DevicesUpdateRequest $request, $id)
    {
        //
       //  $devices = Device::findOrFail($id);
       //  $devices->Update($request->all());
       // return api_success(['data' => $devices], 200);
       return $this->repository->update($request,$id);
    }

    public function destroy($id)
    {

        // Device::destroy($id);
        // return api_success(['message' => 'Delete Device success'],200);
        return $this->repository->destroy($id);
    }
    public function show($id)
    {
        return $this->repository->show($id);
    }
}

