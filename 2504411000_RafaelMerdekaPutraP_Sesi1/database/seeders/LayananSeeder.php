<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $Layanan = Layanan::factory(20)->create(); 
 
    Layanan::factory(3)->create()->each(function ($satupesanan) use ($Layanan) { 
        Pesanan::factory(5) 
            ->dibuka() 
            ->for($satupesanan)  
    )}
}
}
