<?php

namespace Database\Seeders;

use App\Models\Eskul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EskulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eskul::factory()->count(50)->create(); 
    }
}
