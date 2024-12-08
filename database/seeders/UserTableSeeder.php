<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'superadmin',
                'email' => 'superadminlaravel1@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '0961975206',
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agentlaravel1@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '0474651512',
                'role' => 'agent',
                'status' => 'active'
            ],
            [
                'name' => 'Manual User',
                'username' => 'manualuser',
                'email' => 'userlaravel1@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '012345678',
                'role' => 'user',
                'status' => 'active'
            ]
        ]);
    }
}
