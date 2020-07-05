<?php

namespace App\Http\Controllers\Api;

use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComputerRequest;
use App\Repositories\ComputerRepository;
use App\Http\Requests\ComputerStoreRequest;
use App\Http\Requests\ComputerUpdateRequest;

/**
 * @group computers
 */
class ComputerController extends BaseController
{
    private $repository;
    public function __construct(ComputerRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * index
     * @param  ComputerStoreRequest $request [description]
     * @return [type]                        [description]
     */
    public function index()
    {
        //  $computerList = DB::table('computers')->orderby('id','ASC')->get();
        // return api_success(['data' => $computerList],"");
        return $this->repository->all();
    }

    /**
     * create
     * @bodyParam name string required
     * @bodyParam desc string required
     * @bodyParam status string required
     * @bodyParam created_at timestamp
     * @bodyParam update_at timestamp
     * @bodyParam rooms_id int required
     * @param  ComputerStoreRequest $request [description]
     * @return [type]                        [description]
     */
    public function store(ComputerStoreRequest $request)
    {
        // $computer = Computer::create($request->all());
        // return api_success(['data' => $computer],200);
        return $this->repository->store($request);
    }

    /**
     * update
     * @bodyParam id int required
     * @param  ComputerStoreRequest $request [description]
     * @return [type]                        [description]
     */
    public function update(ComputerUpdateRequest $request, $id)
    {
        // $computer = Computer::findOrFail($id);
        // $computer->Update($request->all());
        // return api_success(['data' => $computer],200);
        
        return $this->repository->update($request,$id);
    }

    /**
     * destroy
     * @bodyParam id int required
     * @param  ComputerStoreRequest $request [description]
     * @return [type]                        [description]
     */
    public function destroy($id)
    {
        // Computer::destroy($id);
        // return api_success(['message' => 'delete computer complete'],200);
        
        return $this->repository->destroy($id);
    }

    /**
     * show
     * @bodyParam id int required
     * @param  ComputerStoreRequest $request [description]
     * @return [type]                        [description]
     */
    public function show($id)
    {
        return $this->repository->show($id);
        
    }
}
