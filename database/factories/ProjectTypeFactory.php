<?php

namespace Database\Factories;

use App\Models\ProjectType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectTypeFactory extends Factory
{
    protected $model = ProjectType::class;

    public function definition()
    {
        $departments = [
            'Attendance',
            'HR General',
            'Data Analytics',
            'Web Development',
        ];

        $department = $this->faker->randomElement($departments);

        $name = $this->faker->jobTitle;

        return [
            'name' => $name,
            'department' => $department,
        ];
    }
}
