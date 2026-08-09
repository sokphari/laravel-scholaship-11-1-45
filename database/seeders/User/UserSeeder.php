<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => true,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'status' => true,
            ],
            [
                'name' => 'User Satu',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => true,
            ],
            [
                'name' => 'User Dua',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => false,
            ],
            [
                'name' => 'User Tiga',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => true,
            ]
        ]);
    }
}
