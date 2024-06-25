<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PayPeriod;

class PayPeriodsTableSeeder extends Seeder
{
    public function run(): void
    {
        PayPeriod::factory()->count(10)->create(); // Adjust the count as needed
    }
}
