<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Divisions;

class DivisionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divisions::create([
            'name_division' => 'divisi a',
            'member' => 1,
        ]);
    }
}