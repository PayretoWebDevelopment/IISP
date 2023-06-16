<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    <div class="container">
        {{-- <h1 class="text-2xl font-bold mt-6">Dashboard</h1> --}}
        @auth
            <h1 class="text-3xl font-bold mt-6">
                Welcome, {{ auth()->user()->name }}!
            </h1>
        @endauth
        <h2 class="text-l font-bold mt-6">Summary of Activities for Today</h2>
        @if ($timesheets->isEmpty())
            <p>No timesheets found for today.</p>
        @else
            <table>
                @foreach ($timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
        return $entry->created_at->format('Y-m-d');
    }) as $date => $entries)
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 font-bold uppercase">Date</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Name</th>
                            <th class="py-2 px-4 font-bold uppercase">Project Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                            <th class="py-2 px-4 font-bold uppercase">End Time</th>
                            <th class="py-2 px-4 font-bold uppercase">Duration</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach ($entries as $timesheet)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">{{ $timesheet->created_at }}</td>
                                <td class="py-2 px-4">{{ $timesheet->task_name }}</td>
                                <td class="py-2 px-4">{{ $timesheet->project_type }}</td>
                                <td class="py-2 px-4">{{ $timesheet->task_type }}</td>
                                <td class="py-2 px-4">{{ $timesheet->start_time->format('h:i A') }}</td>
                                <td class="py-2 px-4">{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                                <td class="py-2 px-4">{{ $timesheet->getDurationAttribute() }}</td>
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
