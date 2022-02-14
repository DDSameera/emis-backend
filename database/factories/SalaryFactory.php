<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $employees = Employee::pluck('emp_no')->toArray();
        return [
            'emp_no' => $this->faker->unique()->randomElement($employees),
            'salary' => $this->faker->numberBetween(80000,90000),
            'from_date' => $this->faker->dateTimeThisMonth,
            'to_date' => $this->faker->dateTimeThisMonth,


        ];
    }
}
