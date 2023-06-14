<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timesheet>
 */
class TimesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all()->pluck('id')->toArray();
        $f = $this->faker;
        $task_list= ['TASK', 'BREAK', 'LOGIN', 'LOGOUT', 'LUNCH', 'MEETING', 'TRAINING', 'WEBINAR'];
        $projectTypes = [
            ['Attendance', ['Break', 'Login', 'Logout']],
            ['HR General', ['Ad Hoc', 'Email Correspondence', 'Meeting', 'Monthly Assembly', 'Performance Evaluation', 'Team Building', 'Team Tailgate', 'Touchbase', 'Training or Webinar', 'Weekly Huddle']],
            ['Data Analytics', ['Automation', 'Data Analysis', 'Data Cleansing', 'Data Consolidation', 'Meeting', 'Networking Debugging', 'Report Generation', 'Workshop']],
            ['Web Development', ['Deep Dive Session', 'Meeting', 'Debugging']],
        ];

        $projectTypeNames = [];
        $validProjectTypes = [];

        foreach ($projectTypes as &$projectType) {
            $typeName = $projectType[0];
            $subtypes = $projectType[1];

            $subtypes = array_unique($subtypes); // Remove duplicate subtypes

            $projectType = [$typeName, $subtypes]; // Update the project type entry

            if (in_array($typeName, $projectTypeNames)) {
                $typeName .= ' (Duplicate)';
            }

            foreach ($subtypes as $subtype) {
                $validProjectTypes[] = "$typeName: $subtype";
            }

            $projectTypeNames[] = $typeName;
        }

        $end_time = $f->dateTimeBetween(startDate: '-3 hours', endDate: 'now');

        return [
            'user_id'=>$f->randomElement($users),
            'task_name'=>$f->lexify('????? Development'),
            'task_type'=>$f->randomElement($task_list),
            'project_type'=>$f->randomElement($validProjectTypes),
            'end_time'=>$end_time,
            'start_time'=>$f->dateTimeBetween(startDate: '-8 hours', endDate: 'now'), //max is end-time
        ];
    }
}
