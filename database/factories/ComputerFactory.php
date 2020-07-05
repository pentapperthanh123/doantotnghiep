<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Enums\ComputerStatus;

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
$factory->define(App\Models\Computer::class, function (Faker $faker) {
	$status = array(ComputerStatus::DISABLE,ComputerStatus::ENABLE);
	shuffle($status);
    return [
        'name' => 'MAY'.$faker->randomDigit,
        'desc' => $faker->languageCode,
        'status' => $status[0],
        'rooms_id' => $faker->randomDigit,
    ];
});
