<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::FirstOrCreate([
            "name" => "Admin",
            "email"=> "Admin@boss.com",
            "password"=> bcrypt("admin"),
            "role"=> "admin"
        ]);
        User::FirstOrCreate([
            "name" => "Abdo",
            "email"=> "abdo@gmail.com",
            "password"=> bcrypt("abdo"),
            "role"=> "viewer"
        ]);
        User::FirstOrCreate([
            "name" => "ali",
            "email"=> "ali@gmail.com",
            "password"=> bcrypt("ali"),
            "role"=> "viewer"
        ]);
    }
}
