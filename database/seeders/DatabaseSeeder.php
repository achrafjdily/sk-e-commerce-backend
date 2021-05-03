<?php

namespace Database\Seeders;

use Database\Seeders\Classes\UsersSeeder;
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
        $this->call(UsersSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
