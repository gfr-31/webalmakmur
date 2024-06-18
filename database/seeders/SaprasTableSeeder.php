<?php

namespace Database\Seeders;

use App\Models\Sapras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaprasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sapras::factory()->count(20)->create(); 
    }
}
