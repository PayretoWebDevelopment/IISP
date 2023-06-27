<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Approval;
use App\Models\ProjectType;
use App\Models\TaskType;
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
        ProjectType::factory()->create([
            'name' => 'Break',
            'department' => 'Attendance',
        ]);

        ProjectType::factory()->create([
            'name' => 'Login',
            'department' => 'Attendance',
        ]);

        ProjectType::factory()->create([
            'name' => 'Logout',
            'department' => 'Attendance',
        ]);

        ProjectType::factory()->create([
            'name' => 'Ad Hoc',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Email Correspondence',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Meeting',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Monthly Assembly',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Performance Evaluation',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Team Building',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Team Tailgate',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Touchbase',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Training or Webinar',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Weekly Huddle',
            'department' => 'HR General',
        ]);

        ProjectType::factory()->create([
            'name' => 'Automation',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Data Analysis',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Data Cleansing',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Data Consolidation',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Meeting',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Networking Debugging',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Report Generation',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Workshop',
            'department' => 'Data Analytics',
        ]);

        ProjectType::factory()->create([
            'name' => 'Deep Dive Session',
            'department' => 'Web Development',
        ]);

        ProjectType::factory()->create([
            'name' => 'Meeting',
            'department' => 'Web Development',
        ]);

        ProjectType::factory()->create([
            'name' => 'Debugging',
            'department' => 'Web Development',
        ]);

        ProjectType::factory()->create([
            'name' => 'Programming and Development',
            'department' => 'Web Development',
        ]);

        TaskType::factory()->create([
            'name' => 'Task',
        ]);

        TaskType::factory()->create([
            'name' => 'Break',
        ]);

        TaskType::factory()->create([
            'name' => 'Login',
        ]);

        TaskType::factory()->create([
            'name' => 'Logout',
        ]);

        TaskType::factory()->create([
            'name' => 'Lunch',
        ]);

        TaskType::factory()->create([
            'name' => 'Meeting',
        ]);

        TaskType::factory()->create([
            'name' => 'Training',
        ]);

        TaskType::factory()->create([
            'name' => 'Webinar',
        ]);
    }
}
