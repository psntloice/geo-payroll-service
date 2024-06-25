<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory()->count(10)->create(); // Adjust the count as needed
    }
}
