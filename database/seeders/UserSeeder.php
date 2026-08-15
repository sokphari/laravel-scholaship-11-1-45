<?php

namespace Database\Seeders;

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
                'name'=>'ravy',
                'email'=>'ravy@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'hr',
                'status'=>'active'
            ],
            [
                'name'=>'sanok',
                'email'=>'sanok@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'boramey',
                'email'=>'boramey@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'channy',
                'email'=>'chhanny@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'chompey',
                'email'=>'chompey@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'employee',
                'status'=>'active'
            ],
        ]);
    }
}
