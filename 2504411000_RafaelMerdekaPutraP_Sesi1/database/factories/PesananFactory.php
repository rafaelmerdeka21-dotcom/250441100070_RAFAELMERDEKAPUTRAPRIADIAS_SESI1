<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_layanan' => Pesanan::factory(), 
 
            'kode_layanan' => strtoupper( 
                fake()->unique()->bothify('KL-###') 
            ), 
 
            'nama_layanan' => fake()->words(3, true), 
 
            'jenis' => fake()->numberBetween(1, 4), 
 
            'status_aktif' => false, 
 
            'tanggal_dibuka' => null, 
        ];
    }
}
