<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Timesheets Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1>Timesheets Report</h1>
    <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 font-bold uppercase">Date</th>
                {{-- <th class="py-2 px-4 font-bold uppercase">Project</th>
                <th class="py-2 px-4 font-bold uppercase">Task</th>
                <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                <th class="py-2 px-4 font-bold uppercase">End Time</th> --}}
                <th class="py-2 px-4 font-bold uppercase">Duration</th>
                {{-- <th class="py-2 px-4 font-bold uppercase">Description</th> --}}
                <th class="py-2 px-4 font-bold uppercase">Hourly rate</th>
                <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @php
                $groupedTimesheets = $timesheets->groupBy(function ($timesheet) {
                    return $timesheet->start_time->format('Y-m-d');
                });
            @endphp
            @foreach ($groupedTimesheets as $date => $timesheetsByDate)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td>{{ $date }}</td>
                    {{-- <td>{{ $timesheet->project_type }}</td>
                    <td>{{ $timesheet->task_type }}</td>
                    <td>{{ $timesheet->start_time->format('h:i:s A') }}</td> --}}
                    {{-- <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i:s A') : '' }}</td> --}}
                    <td>
                        @php
                            $totalDurationInSeconds = $timesheetsByDate->sum(function ($timesheet) {
                                $duration = $timesheet->getBillableDurationAttribute();
                                [$hours, $minutes, $seconds] = explode(':', $duration);
                                $durationInSeconds = $hours * 3600 + $minutes * 60 + $seconds;
                                return $durationInSeconds;
                            });
                            
                            $totalDuration = gmdate('H:i:s', $totalDurationInSeconds);
                        @endphp
                        {{ $totalDuration }}
                    </td>
                    {{-- <td>{{ $timesheet->task_name }}</td> --}}
                    <td>@php
                        $hourlyRate = $timesheetsByDate->first()->hourly_rate;
                    @endphp
                        {{ $hourlyRate }}</td>
                    <td>@php
                        $array_time = (array) explode(':', $totalDuration);
                        //dd($array_time);
                        $hours = (int) $array_time[0];
                        $minutes = (int) $array_time[1];
                        $seconds = (int) $array_time[2];
                        
                        $total_hours = $hours + $minutes / 60 + $seconds / 3600;
                        $rate = number_format($hourlyRate * $total_hours, 2);
                    @endphp
                        {{ $rate }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-200 text-gray-700">
                <th colspan="7"></th>
                <th>Total</th>
                <th>{{ $totalAllowance }}</th>
            </tr>
        </tfoot>

    </table>
</body>

</html>
