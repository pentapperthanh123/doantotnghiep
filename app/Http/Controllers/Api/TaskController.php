<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Repositories\TaskRepository;
use App\Http\Resources\TaskResource;
use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
class TaskController extends BaseController
{
    private $repository;
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {   
        return $this->repository->all();
    }

    public function store(TaskStoreRequest $request)
    {     
        
        return $this->repository->store($request);
    }

    public function update(TaskUpdateRequest $request, $id)
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