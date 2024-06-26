<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Companies;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Companies>
 */
class CompaniesFactory extends Factory
{
    protected $model = Companies::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'logo' => $this->faker->imageUrl(100, 100, 'logo'), // contoh URL gambar logo
            'website' => $this->faker->url,
        ];
    }
}