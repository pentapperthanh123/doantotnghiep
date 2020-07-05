<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Device;
use App\Models\Computer;
use App\Models\TypeDevice;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeviceRequest;


class DeviceController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = request()->only('action', 'key');

        if($filters && $filters['action'] == 'search'){
            $devicesList = Device::with(['computer','typeDevice'])->where('name', 'like', '%'.$filters['key'].'%')->orderBy('id','ASC')->paginate(20);
        }else{
            $itemPerPage = 20;
            $devicesList = Device::with(['computer','typeDevice'])->paginate($itemPerPage);
        }        
        return view('devices.index',['devicesList'=> $devicesList]); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typedeviceList = TypeDevice::all();
        $computerList = Computer::all();
        $tags = Tag::all();
        $data = array("computerList" => $computerList,
            "typedeviceList" => $typedeviceList,
            "tags" => $tags);
        return view('devices.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        Device::create($request->all());
        return redirect('devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $typedevicesList = TypeDevice::all();
        $computerList = Computer::all();
        $devices = Device::where('id', $id)->first();
        return view('devices.edit',array('computerList' => $computerList,
                                          'typedevicesList' => $typedevicesList),
                                         ['devices'=>$devices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $request, $id)
    {
        //
        $devices = Device::findOrFail($id);
        $devices->update($request->all());
        return redirect('devices');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::destroy($id);
        return redirect('devices');
    }
}
