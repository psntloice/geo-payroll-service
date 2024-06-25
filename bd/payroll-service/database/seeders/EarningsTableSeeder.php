<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Earning;

class EarningsTableSeeder extends Seeder
{
    public function run(): void
    {
        Earning::factory()->count(10)->create(); // Adjust the count as needed
    }
}
