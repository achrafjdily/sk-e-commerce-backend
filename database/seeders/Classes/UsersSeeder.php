<?php

namespace Database\Seeders\Classes;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Super Admin",
            'username' => "superadmin",
            'email' => "admin@admin.com",
            'phone' => '00212614437859',
            'password' => Hash::make('123456789'),
        ]);
    }
}
