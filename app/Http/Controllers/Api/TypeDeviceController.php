<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TypeDeviceStoreRequest;
use App\Http\Requests\TypeDeviceUpdateRequest;
use App\Repositories\TypeDeviceRepository;
use App\Http\Resources\TypeDeviceResource;
use App\Models\TypeDevices;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
class TypeDeviceController extends BaseController
{
    private $repository;
    public function __construct(TypeDeviceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {   
        return $this->repository->all();
    }

    public function store(TypeDeviceStoreRequest $request)
    {     
        
        return $this->repository->store($request);
    }

    public function update(TypeDeviceUpdateRequest $request, $id)
    {        
        return $this->repository->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }
}