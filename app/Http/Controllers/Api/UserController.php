<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class UserController extends BaseController
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        // $userList = DB::table('users')->orderBy('id','ASC')->get();
        // return api_success(['data' => $userList],"",200);
        
        return $this->repository->all();
    }

    public function store(UserStoreRequest $request)
    {     
        // $user =  User::create($request->all());
        // return api_success(['data' => $user],200); 
        
        return $this->repository->store($request);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->Update($request->all());
        // return api_success(['data' => $user],200);
        
        return $this->repository->update($request,$id);
    }

    public function destroy($id)
    {
        // User::destroy($id);
        // return api_success(['message' => 'Delete User Success'],200);
        
        return $this->repository->destroy($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }
}