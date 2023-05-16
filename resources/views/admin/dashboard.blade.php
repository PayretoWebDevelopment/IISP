<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    @auth
        <span class="font-bold uppercase">
            Welcome, {{ auth()->user()->name }}!
        </span>
    @endauth
    <h1>Dashboard</h1>
    <div class="container flex justify-center">
        <div class="text-center" style="width:40%;">
            <h3>Daily Intern Attendance Tracker</h3>
            <canvas id="attendanceTracker"></canvas>
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
</x-layout>
