<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'first_name' => 'vebrian',
        //     'last_name' => 'user',
        //     'role' => 'user',
        //     'email' => 'vebrian@gmail.com',
        //     'password' => Hash::make('vebrian')
        // ]);

        // User::create([
        //     'first_name' => 'veb',
        //     'last_name' => 'admin',
        //     'role' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('password')
        // ]);

        User::create([
            'first_name' => 'veb',
            'last_name' => 'super admin',
            'role' => 'superadmin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}