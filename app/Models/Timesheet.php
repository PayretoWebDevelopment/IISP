<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'billable'
    ];

    protected $appends = ['duration'];

    protected $casts = [
        //casts these to Carbon datatype (which extends php DateTime)
        'start_time' => 'datetime:Carbon',
        'end_time' => 'datetime:Carbon',
    ];

    public function getDurationAttribute()
    {
        if (!$this->end_time) {
            return '';
        }

        $start = $this->start_time;
        $end = $this->end_time;
        $duration = $end->diff($start);

        return $duration->format('%h:%I:%S');
    }

    public function getDurationValue()
    {
        if (!$this->end_time) {
            return '';
        }

        $start = $this->start_time;
        $end = $this->end_time;
        $duration_seconds = $end->format('U') - $start->format('U');
        return $duration_seconds / 3600.00;
    }

    public function getBillableDurationAttribute()
    {
        if (!$this->end_time || $this->billable !== 1) {
            return '';
        }

        $start = $this->start_time;
        $end = $this->end_time;
        $duration = $end->diff($start);

        return $duration->format('%h:%I:%S');
    }


    protected $table = 'timesheets';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
