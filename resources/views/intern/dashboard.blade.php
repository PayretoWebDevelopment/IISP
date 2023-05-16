<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    @auth
    <li>
        <span class="font-bold uppercase">
            Welcome, {{auth()->user()->name}}!
        </span>
    </li>
    @endauth
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Summary of Activities for Today</h2>
        @if($timesheets->isEmpty())
        <p>No timesheets found for today.</p>
        @else
        <table>
            @foreach($timesheets->sortByDesc('start_time')->groupBy(function($entry) {
                return $entry->created_at->format('Y-m-d');
            }) as $date => $entries)
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Task Name</th>
                    <th>Project Type</th>
                    <th>Task Type</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $timesheet)<tr>

                    <td>{{$timesheet->created_at}}</td>
                    <td>{{$timesheet->task_name}}</td>
                    <td>{{$timesheet->project_type}}</td>
                    <td>{{$timesheet->task_type}}</td>
                    <td>{{$timesheet->start_time->format('h:i A')}}</td>
                    <td>{{$timesheet->end_time ? $timesheet->end_time->format('h:i A') : ''}}</td>
                    <td>{{$timesheet->getDurationAttribute()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
        @endif
    </div>


    <div style="width:40%;">
        <h3>Daily Intern Attendance Tracker</h3>
        <canvas id="attendanceTracker"></canvas>
    </div>

    {{-- script for attendace tracker --}}
    <script>
        var ctx = document.getElementById('attendanceTracker').getContext('2d');
        var myPieChart = new Chart(ctx, {
                    type: 'pie'
                    , data: {
            labels: ['Timed In', 'Not Timed In'],
            datasets: [{
                backgroundColor: ['#36a2eb', '#ff6384'],
                data: [{{ $timedInPercentage }}, {{ $notTimedInPercentage }}]
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Attendance Tracker'
            }
        }
        });
    </script>
</x-layout>
