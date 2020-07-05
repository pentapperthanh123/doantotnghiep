<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\TagRepository;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class TagController extends BaseController
{
    private $repository;
    public function __construct(TagRepository $repository){
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(TagStoreRequest $request)
    {
        return $this->repository->store($request);
    }

    public function update(TagUpdateRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function destroy($id)
    {
       return $this->repository->destroy($id);
    }
    
}
