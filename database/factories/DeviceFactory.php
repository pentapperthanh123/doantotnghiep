<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Enums\DeviceStatus;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Device::class, function (Faker $faker) {
    $names = array('CPU','RAM','HDD','Mainboard','Mouse','Monitor');

    $status = array(DeviceStatus::WORKING, 
                    DeviceStatus::REPAIRING, 
                    DeviceStatus::CRASH);

    $idsc = App\Models\Computer::pluck('id')->toArray();
    $idst = App\Models\TypeDevice::pluck('id')->toArray();

    shuffle($names);
    shuffle($status);
    shuffle($idsc);
    shuffle($idst);
    return [
        'name' => $names[0],
        'desc' => $faker->safeColorName,
        'status' => $status[0],
        'computers_id' => $idsc[0],
        'type_devices_id' => $idst[0], 
        'date_of_use' => $faker->dateTime( $max = 'now',$timezone = null ),
        'maintenance' => $faker->dateTime( $max = 'now',$timezone = null )
    ];
});
