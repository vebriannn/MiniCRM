<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Companies;

class CompaniesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Companies::create([
            'name' => 'pt indodax indonesia',
            'email' => 'indodax@gmail.com',
            'logo' => 'test.jpg',
            'website' => 'https://indodax.com',
        ]);
    }
}