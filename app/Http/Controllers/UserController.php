<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UserWebStoreRequest;
use App\Http\Requests\UserWebUpdateRequest;
use App\User;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->query('col');
        // dd($params);
        $filters = request()->only('action', 'key');

        if($filters && $filters['action'] == 'search'){
            //For search
            $userList = DB::table('users')->where('name', 'like', '%'.$filters['key'].'%')
                                        ->orderBy('id','ASC')->paginate(10);
        }
        else {
            if (isset($params)) {
                $params = explode(' ', $request->query('col'));
                $userList = User::userRole($params[0])->paginate(10);
            }
            else{
                //For all user
                $userList = DB::table('users')->orderBy('id','DESC')->paginate(10);
            }
        }        
        return view('users.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $this->authorize($user, 'create');

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserWebStoreRequest $request)
    {
            $request['password'] = bcrypt($request['password']);
            User::create($request->all());
            return redirect('users')->with(['add' => 'Add New User Success !!!!!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userShow = User::findOrFail($id);
        return view('users.show', ['user' => $userShow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $this->authorize($user, 'update');
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserWebUpdateRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $user->Update($request->all());
        return redirect('users')->with(['edit' => 'Update Success !!!']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return redirect('/users')->with(['delete' => 'Delete User Success !!!']);
    }

}
