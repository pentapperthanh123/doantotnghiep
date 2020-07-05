<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypeDevice;
use App\Http\Requests\TypeDeviceRequest;



class TypeDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = request()->only('action', 'key');
        $param = request()->query('fil-name');
        if($filters && $filters['action'] == 'search'){

            $typedevicesList = DB::table('type_devices')->where('name', 'like', '%'.$filters['key'].'%')->orderBy('id','ASC')->paginate(20);
        }else{
            if($param){
                $typedevicesList = DB::table('type_devices')->where('id', 'like', '%'.$param.'%')->orderBy('id','ASC')->paginate(20);
            }
            else{
                $typedevicesList = DB::table('type_devices')->orderBy('id','DESC')->paginate(10);
            }
        }      
        return view('typedevices.index', ['typedevicesList' => $typedevicesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typedevices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDeviceRequest $request)
    {
        TypeDevice::create($request->all());
        return redirect('typedevices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
TypeDevice     */
    public function show($id)
    {
        $typeDevice = TypeDevice::findOrFail($id);
        return view('typedevices.show', ['typeDevice', $typeDevice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeDevice = typeDevice::where('id',$id)->first();
        return view('typedevices.edit',['typedevices' => $typeDevice]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeDeviceRequest $request, $id)
    {
        $typedevices = typeDevice::findOrFail($id);
        $typedevices->Update($request->all());
        // dd($typedevices);
        return redirect('typedevices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeDevice::destroy($id);
        return redirect('/typedevices');
    }

}
