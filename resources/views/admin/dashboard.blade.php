<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    <h1 class="font-bold text-gray-700">Dashboard</h1>
    @auth
    @endauth
    <div class="container flex justify-start">
        <div class="text-center" style="width:40%;">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h3>Daily Intern Attendance Tracker</h3>
                <canvas id="attendanceTracker"></canvas>
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
</x-layout>
