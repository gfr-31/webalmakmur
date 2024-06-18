<?php

namespace Database\Seeders;

use App\Models\DataGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataGuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataGuru::factory()->count(20)->create(); 
    }
}
