<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Approval;
use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Timesheet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $faker = Factory::create();
        $departments = ['Technology', 'People', 'Business Development', 'Operations'];
        User::factory()->create([
            'name' => 'Test Superadmin',
            'username' => 'testsuperadmin',
            'role' => 'superadmin',
            'password' => bcrypt('123456'),
            'sex' => 'Male',
            'email' => 'test@example.com',
            'contact_number' => '123456',
            'position' => 'CEO',
            'start_date' => '2023/1/2',
            'active' => true,
            'hourly_rate' => '54.01',
            'required_hours' => '500',
            'bank' => 'GCASH',
            'bank_account_no' => '1244356',
            'hourly_rate_last_updated' => '2023/6/3',
            'supervisor' => 'Juan de la Cruz',
            'department' => $faker->randomElement($departments),
        ]);

        User::factory()->create([
            'name' => 'Test Admin',
            'username' => 'testadmin',
            'role' => 'admin',
            'sex' => 'Female',
            'password' => bcrypt('123456'),
            'email' => 'test1@example.com',
            'contact_number' => '123456',
            'position' => 'CEO',
            'start_date' => '2023/1/2',
            'active' => true,
            'hourly_rate' => '54.00',
            'required_hours' => '500',
            'bank' => 'GCASH',
            'bank_account_no' => '1244356',
            'hourly_rate_last_updated' => '2023/6/3',
            'supervisor' => 'Juan de la Cruz',
            'department' => $faker->randomElement($departments),
        ]);

        User::factory()->create([
            'name' => 'Test Intern',
            'username' => 'testintern',
            'role' => 'intern',
            'password' => bcrypt('123456'),
            'sex' => 'Female',
            'email' => 'test2@example.com',
            'contact_number' => '123456',
            'position' => 'CEO',
            'start_date' => '2023/1/2',
            'active' => true,
            'hourly_rate' => '54.34',
            'required_hours' => '500',
            'bank' => 'GCASH',
            'bank_account_no' => '1244356',
            'hourly_rate_last_updated' => '2023/6/3',
            'supervisor' => 'Juan de la Cruz',
            'department' => $faker->randomElement($departments),
        ]);
        User::factory(10)->create();
        Timesheet::factory(10)->create();
        Approval::factory(10)->create();
    }
}
