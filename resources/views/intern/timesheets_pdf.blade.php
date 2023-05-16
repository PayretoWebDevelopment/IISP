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
                <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                <th class="py-2 px-4 font-bold uppercase">End Time</th>
                <th class="py-2 px-4 font-bold uppercase">Total Hours</th>
                <th class="py-2 px-4 font-bold uppercase">Project</th>
                <th class="py-2 px-4 font-bold uppercase">Task</th>
                <th class="py-2 px-4 font-bold uppercase">Description</th>
                <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @foreach ($timesheets as $timesheet)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td>{{ $timesheet->start_time->format('Y-m-d') }}</td>
                    <td>{{ $timesheet->task_name }}</td>
                    <td>{{ $timesheet->project_type }}</td>
                    <td>{{ $timesheet->task_type }}</td>
                    <td>{{ $timesheet->start_time->format('h:i A') }}</td>
                    <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                    <td>{{ $timesheet->getDurationAttribute() }}</td>
                    <td>{{ $timesheet->rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
