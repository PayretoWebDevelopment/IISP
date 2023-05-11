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
                @foreach($timesheets->where('created_at', '>=', now()->today())->groupBy(function($entry) {
                if(isset($entry->created_at)){
                return $entry->created_at->format('Y-m-d');
                }else{
                return '';
                }
                }) as $date => $entries)
                @foreach ($timesheets as $entry)
                <tr>
                    <td>{{$entry->created_at}}</td>
                    <td>{{$entry->task_name}}</td>
                    <td>{{$entry->project_type}}</td>
                    <td>{{$entry->task_type}}</td>
                    <td>{{$entry->start_time->format('h:i A')}}</td>
                    <td>{{$entry->end_time ? $entry->end_time->format('h:i A') : ''}}</td>
                    <td>{{$entry->getDurationAttribute()}}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div style="width:40%;">
        <h3>Attendance Tracker</h3>
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
