<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payroll;

class PayrollTableSeeder extends Seeder
{
    public function run(): void
    {
        Payroll::factory()->count(10)->create(); // Adjust the count as needed
    }
}
