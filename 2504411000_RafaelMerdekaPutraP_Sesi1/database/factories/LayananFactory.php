<?php

namespace Database\Factories;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array 
{ 
    $nama = fake()->unique()->words(2, true); 
 
    return [ 
          'kode' => fake()->unique()->randomElement([ 
                'LK-001', 
                'LK-002', 
                'LS-001', 
            ]), 
 
            'nama' => fake()->randomElement([ 
                'Cuci Kering ', 
                'Cuci Setrika ', 
                'Bed Cover',
                'Jas' 
            ]),     
          ];
} 
}