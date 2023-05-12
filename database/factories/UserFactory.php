<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $f = $this->faker;
        $roles = ['superadmin', 'admin', 'intern'];
        $departments = ['Technology', 'People', 'Business Development'];
        return [
            'name' => $f->name(),
            'username' => $f->lastname(),
            'email' => fake()->unique()->safeEmail(),
            'department' => $f->randomElement($departments),
            'password' => bcrypt('123456'), // password
            'role' => $f->randomElement($roles),
            'contact_number' => $f->phoneNumber(),
            'position' => $f->jobTitle(),
            'start_date' => '2023/1/2',
            'active' => true,
            'hourly_rate' => $f->numberBetween(25, 60),
            'required_hours' => $f->numberBetween(100, 500), 
            'bank' => $f->randomElement(['GCASH', 'BDO', 'DBP']), 
            'bank_account_no' => $f->creditCardNumber(),
            'hourly_rate_last_updated' => '2023/6/3',
            'supervisor' => $f->name(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
