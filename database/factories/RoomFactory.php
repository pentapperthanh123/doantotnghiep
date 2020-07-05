<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\Models\Room::class, function (Faker $faker) {
	$names = array('Phòng X1.401','Phòng X2.402','Phòng X2.403','Phòng D2.405','Phòng D2.503','Phòng D2.504');
	shuffle($names);
	$status = array('0','1','2');
	shuffle($status);
    return [
        'name' => $names[0],
        'desc' => $faker->randomDigitNotNull,
        'status' => $status[0],
    ];
});
