<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Device;
use App\Models\Computer;
use App\Models\TypeDevice;
use App\Models\Tag;
use Illuminate\Http\Request;


class ChartController extends Controller
{
   public function total(){
   		$room = Room::pluck('id')->count();
        $computer = Computer::pluck('id')->count();
        $device = Device::pluck('id')->count();
        $com_err = Computer::where('status','=','1')->count();
        $dev_err = Device::where('status','=','2')->count();
        $dev_fix = Device::where('status','=','1')->count();
        return view('total', [
            'room' => $room,
            'computer' => $computer,
            'device' => $device,
            'com_err' => $com_err,
            'dev_err' => $dev_err,
            'dev_fix' => $dev_fix,
            'com_err' => $com_err,
        ]);
   }
}
