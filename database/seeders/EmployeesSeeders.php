<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employees;

class EmployeesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            'first_name' => 'putri',
            'last_name' => 'loka',
            'company' => 5,
            'email' => 'putts@gmail.com',
            'phone' => '089659058823'
        ]);
    }
}