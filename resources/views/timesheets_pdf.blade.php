<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Timesheets Report</title>
</head>
<body>
    <h1>Timesheets Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
                <th>Project</th>
                <th>Task</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timesheets as $timesheet)
            <?php
                $duration = $timesheet->getBillableDurationAttribute();
            ?>
            <tr>
                <td>{{ $timesheet->start_time->format('Y-m-d') }}</td>
                <td>{{ $timesheet->project_type }}</td>
                <td>{{ $timesheet->task_type }}</td>
                <td>{{ $timesheet->start_time->format('h:i:s A') }}</td>
                <td>{{ $timesheet->end_time->format('h:i:s A') }}</td>
                <td>{{$duration}}</td>
                <td>{{ $timesheet->task_name }}</td>
            </tr>
            @endforeach

            

        </tbody>
    </table>
</body>
</html>
