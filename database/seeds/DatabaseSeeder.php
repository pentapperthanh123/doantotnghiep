<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	UsersTableSeeder::class,
        	RoomsTableSeeder::class,
            ComputersTableSeeder::class,
            TypeDevicesTableSeeder::class,
            DevicesTableSeeder::class,
            TagsTableSeeder::class,
            TaskTableSeeder::class,
        ]);
    }
}
