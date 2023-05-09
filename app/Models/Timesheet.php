<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

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
}
