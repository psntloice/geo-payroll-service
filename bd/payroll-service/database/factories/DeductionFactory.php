<?php

namespace Database\Factories;

use App\Models\Deduction;
use App\Models\PayPeriod;
use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class DeductionFactory extends Factory
{
    protected $model = Deduction::class;
/**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch employee IDs from an external service
        // $employeeIDs = $this->getEmployeeIDsFromExternalService();

        return [
            // 'employeeID' => $this->faker->randomElement($employeeIDs),
            'employeeID' => $this->faker->unique()->numberBetween(1, 100),
            'payPeriodID' => PayPeriod::inRandomOrder()->first()->payPeriodID,
            'deductionType' => $this->faker->randomElement(['Tax', 'Insurance', 'Retirement']),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            // 'taxID' => Tax::inRandomOrder()->first()->taxID,
        ];
    }

    // private function getEmployeeIDsFromExternalService()
    // {
    //     // Example API call to get employee IDs
    //     $response = Http::get('https://external-service.com/api/employees');
    //     $employees = $response->json();
    //     return array_column($employees, 'id'); // Adjust based on your API response structure
    // }
}
