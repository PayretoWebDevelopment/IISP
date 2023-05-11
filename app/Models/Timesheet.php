<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_name',
        'task_type',
        'project_type',
        'start_time',
        'end_time',
    ];

    protected $appends = ['duration'];

    protected $casts = [
        //casts these to Carbon datatype (which extends php DateTime)
        'start_time' => 'datetime:Carbon',
        'end_time' => 'datetime:Carbon',
    ];

    public function getDurationAttribute(){
        if(!$this->end_time){
            return '';
        }

        $start = $this->start_time;
        $end = $this->end_time;
        $duration = $end->diff($start);

        return $duration->format('%h:%I:%S');
    }

    protected $table = 'timesheets';
}
