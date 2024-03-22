<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin 
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminboard123'),
                'role' => 'admin',
                'status' => 'active',
            ],
            // Staff
            [
                'name' => 'Hello',
                'email' => 'hello@example.com',
                'password' => Hash::make('hello123'),
                'role' => 'user',
                'status' => 'active',
            ],
            // User
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'active',
            ],
            [
                'name' => 'User2',
                'email' => 'user2@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'active',
            ],
            [
                'name' => 'User3',
                'email' => 'user3@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
