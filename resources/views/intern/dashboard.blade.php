<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    @auth
        <li>
            <span class="font-bold uppercase">
                Welcome, {{ auth()->user()->name }}!
            </span>
        </li>
    @endauth
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Summary of Activities for Today</h2>
        @if ($timesheets->isEmpty())
            <p>No timesheets found for today.</p>
        @else
            <table>
                @foreach ($timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
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
                        @foreach ($entries as $timesheet)
                            <tr>

                                <td>{{ $timesheet->created_at }}</td>
                                <td>{{ $timesheet->task_name }}</td>
                                <td>{{ $timesheet->project_type }}</td>
                                <td>{{ $timesheet->task_type }}</td>
                                <td>{{ $timesheet->start_time->format('h:i A') }}</td>
                                <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                                <td>{{ $timesheet->getDurationAttribute() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        @endforeach
        @endif
    </div>


    <div class="grid grid-cols-2 gap-4 mt-5">
        <div class="text-center">
            <div
                class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                <h3 class="font-bold">Daily Intern Attendance Tracker</h3>
                <canvas id="attendanceTracker"></canvas>
            </div>
        </div>
        <div class="text-center">
            <div
                class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                <h3 class="font-bold">Department Intern Attendance Tracker</h3>
                <canvas id="departmentTracker"></canvas>
            </div>
        </div>
    </div>

    {{-- script for attendace tracker --}}
    <script>
        var ctx = document.getElementById('attendanceTracker').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
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
    {{-- Department Attendance --}}
    <script>
        var departmentTracker = document.getElementById('departmentTracker').getContext('2d');
        var myPieChart = new Chart(departmentTracker, {
            type: 'bar',
            data: {
                labels: ['Technology', 'People', 'Operations', 'BizDev'],
                datasets: [{
                    backgroundColor: ['#36a2eb', '#ff6384', '#ff3112', '#f31234'],
                    data: [
                        {{ $technologyCount }},
                        {{ $peopleCount }},
                        {{ $opsCount }},
                        {{ $bizdevCount }}
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false, // Disable the default legend
                    },
                },
                title: {
                    display: true,
                    text: 'Department Attendance Tracker',
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        grid: {
                            display: true,
                        },
                    },
                },
            },
        });
    </script>
</x-layout>
