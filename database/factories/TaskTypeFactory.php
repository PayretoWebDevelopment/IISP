<?php

namespace Database\Factories;

use App\Models\TaskType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskTypeFactory extends Factory
{
    protected $model = TaskType::class;

    public function definition()
    {
        $names = [
            'Task',
            'Break',
            'Login',
            'Logout',
            'Lunch',
            'Meeting',
            'Training',
            'Webinar',
        ];

        $name = $this->faker->randomElement($names);

        return [
            'name' => $name,
        ];
    }
}
