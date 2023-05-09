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
        $project_list= ['Deep Dive Session', 'Meeting', 'Debugging'];
        return [
            'user_id'=>$f->randomElement($users),
            'task_name'=>$f->lexify('????? Development'),
            'task_type'=>$f->randomElement($task_list),
            'project_type'=>$f->randomElement($project_list),
            'end_time'=>$f->dateTime(),
            'start_time'=>$f->dateTime('end_time'), //max is end-time
        ];
    }
}
