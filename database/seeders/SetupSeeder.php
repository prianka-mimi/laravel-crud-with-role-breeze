<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role_name' => 'Superadmin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Author',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Editor',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Subscriber',
        ]);

        DB::table('users')->insert([
            'name' => 'SuperAdmin',
            'email' => 'super.admin@gmail.com',
            'username' => 'super-admin',
            'phone' => '0123456789',
            'photo' => 'avatar.png',
            'role' => '1',
            'password' => Hash::make('11'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'phone' => '0123456789',
            'photo' => 'avatar.png',
            'role' => '2',
            'password' => Hash::make('11'),
        ]);

    }
}
