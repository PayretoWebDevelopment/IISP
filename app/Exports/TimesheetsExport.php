<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;


class TimesheetsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $timesheets;

    public function __construct($timesheets)
    {
        $this->timesheets = $timesheets;
    }

    public function collection()
    {
        // Get the timesheets data and format it for export
        $data = collect([]);

        foreach ($this->timesheets as $timesheet) {
            $start_time = Carbon::parse($timesheet->start_time);
            $end_time = Carbon::parse($timesheet->end_time);
            $duration = $start_time->diff($end_time)->format('%H:%I:%S');
            $data->push([
                'date' => $timesheet->start_time->format('Y-m-d'),
                'project_type' => $timesheet->project_type,
                'tast_type' => $timesheet->task_type,
                'start_time' => date('h:i:s A', strtotime($timesheet->start_time)),
                'end_time' => date('h:i:s A', strtotime($timesheet->end_time)),
                'duration' => $duration,
                'task_name' => $timesheet->task_name
            ]);
        }

        return $data;
    }

    public function map($row): array
    {
        return [
            $row['date'],
            $row['project_type'],
            $row['tast_type'],
            $row['start_time'],
            $row['end_time'],
            $row['duration'],
            $row['task_name'],
        ];
    }

    public function headings(): array
    {
        return [
            'Date',
            'Project',
            'Tag',
            'Start Time',
            'End Time',
            'Duration',
            'Description'
        ];
    }
}
