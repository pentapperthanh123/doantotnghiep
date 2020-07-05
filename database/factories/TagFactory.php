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

$factory->define(App\Models\Tag::class, function (Faker $faker) {
	$values = array('CORE i3','CORE i5','CORE i7','CORE i9','XEON','RAM DDR3 4Gb','RAM DDR4 8Gb','Main ASUS','MAIN MSI','NVIDIA GeForce GTX 1080 Ti SLI','NVIDIA GeForce RTX 2080 Ti ','NVIDIA Quadro GV100 32GB');
	shuffle($values);
    return [   
    	'value' => $values[0] ,
    	'devices_id' => $faker->numberBetween($min = 0, $max = 4),
    ];
});
