<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Factory()->create([
            "name" => "Admin",
            "email"=> "Admin@boss.com",
            "password"=> bcrypt("admin"),
            "role"=> "admin"
        ]);
        User::Factory()->create([
            "name"=> "Editor one",
            "email"=> "Editor1@boss.com",
            "password"=> bcrypt("editor"),
            "role"=> "editor"
        ]);
        User::Factory()->create([
            "name"=> "Editor two",
            "email"=> "Editor2@boss.com",
            "password"=> bcrypt("editor"),
            "role"=> "editor"
        ]);
    }
}
