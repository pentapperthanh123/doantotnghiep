<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Room;
use Faker\Generator as Faker;
use App\Models\Device;


class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = request()->only('action', 'key');
        if($filters && $filters['action'] == 'search'){
            $computerList = DB::table('computers')->where('name', 'like', '%'.$filters['key'].'%')
                                        ->orderBy('id','ASC')->paginate(10);
        }else{
            $itemperPage = 12;
            $computerList = DB::table('computers')->orderBy('id','ASC')->paginate($itemperPage);
        }   
        
        return view('computers.index',['computerList' => $computerList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomList = Room::all();
        return view('computers.create',
                array("roomList" => $roomList));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request,Faker $faker)
    {
        // list device ...... 
        // // tag
        // cumputer;;;
        
        $computer = Computer::create($request->all());

        $name_device = $request->get('name_device');
        $desc_device = $request->get('desc_device');
        $status_device = $request->get('status_device');
        $tag_device = $request->get('tag_device');
        $type_devices_id = $request->get('type_devices_id');

        for ($i = 0; $i < count($name_device); $i++) {
            $device = new Device();
            $device->name = $name_device[$i];
            $device->desc = $desc_device[$i];
            $device->status = $status_device[$i];
            $device->computers_id = $computer->id;
            $device->type_devices_id = $type_devices_id[$i];
            $device->date_of_use = $faker->dateTime( $max = 'now',$timezone = null );
            $device->maintenance = $faker->dateTime( $max = 'now',$timezone = null );
            $device->save();
        }
        
        // dd($device->all());
        // dd($request->all());
        return redirect('computers');
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
        $roomList = Room::all();
        $computer = Computer::where('id', $id)->first();
        return view('computers.edit',array("roomList" => $roomList),['computers' => $computer]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->update($request->all());
        return redirect('computers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Computer::destroy($id);
        return redirect('computers');
    }

    public function getCreateDevice(){
        
    }
}
