<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<x-layout module_name="Timesheets">
    <title>Payreto | Timesheets</title>
    <!-- Modal for starting time tracking -->
    <div class="modal fade bg-gray-200 p-5" id="startTimerModal" tabindex="-1" aria-labelledby="startTimerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startTimerModalLabel">Start Time Tracking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="startTimerForm" method="POST" action="/intern/timesheets/start">
                        @csrf
                        <div class="mb-3">
                            <label for="task_name" class="block text-gray-700 font-bold mb-2">Task name</label>
                            <input name="task_name" id="task_name"
                                class="border border-gray-400 rounded w-full py-2 px-3" />
                        </div>

                        <div class="mb-3">
                            <label for="task_type" class="block text-gray-700 font-bold mb-2">Task Type</label>
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3" id="task_type"
                                name="task_type" required>
                                <option value="">Select Task Type</option>
                                <option value="TASK">Task</option>
                                <option value="BREAK">Break</option>
                                <option value="LOGIN">Login</option>
                                <option value="LOGOUT">Logout</option>
                                <option value="LUNCH">Lunch</option>
                                <option value="MEETING">Meeting</option>
                                <option value="TRAINING">Training</option>
                                <option value="WEBINAR">Webinar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="project_type" class="block text-gray-700 font-bold mb-2">Project Type</label>
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3"
                                id="project_type" name="project_type" required>
                                <option value="">Select Project Type</option>
                                <optgroup label="Attendance">
                                    <option value="Attendance: Break">Break</option>
                                    <option value="Attendance: Login">Login</option>
                                    <option value="Attendance: Logout">Logout</option>
                                </optgroup>
                                <optgroup label="HR General">
                                    <option value="HR General: Ad Hoc">Ad Hoc</option>
                                    <option value="HR General: Email Correspondence">Email Correspondence</option>
                                    <option value="HR General: Meeting">Meeting</option>
                                    <option value="HR General: Monthly Assembly">Monthly Assembly</option>
                                    <option value="HR General: Performance Evaluation">Performance Evaluation</option>
                                    <option value="HR General: Team Building">Team Building</option>
                                    <option value="HR General: Team Tailgate">Team Tailgate</option>
                                    <option value="HR General: Touchbase">Touchbase</option>
                                    <option value="HR General: Training or Webinar">Training or Webinar</option>
                                    <option value="HR General: Weekly Huddle">Weekly Huddle</option>
                                </optgroup>
                                <optgroup label="Data Analytics">
                                    <option value="Data Analytics: Automation">Automation</option>
                                    <option value="Data Analytics: Data Analysis">Data Analysis</option>
                                    <option value="Data Analytics: Data Cleansing">Data Cleansing</option>
                                    <option value="Data Analytics: Data Consolidation">Data Consolidation</option>
                                    <option value="Data Analytics: Meeting">Meeting</option>
                                    <option value="Data Analytics: Networking Debugging">Networking Debugging</option>
                                    <option value="Data Analytics: Report Generation">Report Generation</option>
                                    <option value="Data Analytics: Workshop">Workshop</option>
                                </optgroup>
                                <optgroup label="Web Development">
                                    <option value="Web Development: Deep Dive Session">Deep Dive Session</option>
                                    <option value="Web Development: Meeting">Meeting</option>
                                    <option value="Web Development: Debugging">Debugging</option>
                                    <option value="Web Development: Programming and Development">Programming and Development</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="block text-gray-700 font-bold mb-2">Start Time</label>
                            <input type="text" class="form-control border border-gray-400 rounded w-full py-2 px-3"
                                id="start_time" name="start_time" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="block text-gray-700 font-bold mb-2">End Time</label>
                            <input type="text" class="form-control border border-gray-400 rounded w-full py-2 px-3"
                                id="end_time" name="end_time" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="block text-gray-700 font-bold mb-2">Duration</label>
                            <input type="text" class="form-control border border-gray-400 rounded w-full py-2 px-3"
                                id="duration" name="duration" readonly required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        id="startTimerButton">Start Timer</button>
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        id="endTimerButton" style="display: none;">End Timer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="m-10 w-10/12">
        <h1 class="text-3xl font-bold">Recorded Entries</h1>
        @foreach ($timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
        return $entry->start_time->format('Y-m-d');
    }) as $date => $entries)
            <h2 class="text-2xl font-bold mt-6"><b>{{ $date }}</b></h2>
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Task Name</th>
                            <th class="border px-4 py-2">Project Type</th>
                            <th class="border px-4 py-2">Task Type</th>
                            <th class="border px-4 py-2">Start Time</th>
                            <th class="border px-4 py-2">End Time</th>
                            <th class="border px-4 py-2">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $timesheet)
                            <tr>
                                <td class="border px-4 py-2">{{ $timesheet->start_time->format('Y-m-d') }}</td>
                                <td class="border px-4 py-2">{{ $timesheet->task_name }}</td>
                                <td class="border px-4 py-2">{{ $timesheet->project_type }}</td>
                                <td class="border px-4 py-2">{{ $timesheet->task_type }}</td>
                                <td class="border px-4 py-2">{{ $timesheet->start_time->format('H:i:s') }}</td>
                                <td class="border px-4 py-2">
                                    {{ $timesheet->end_time ? $timesheet->end_time->format('H:i:s') : '' }}</td>
                                <td class="border px-4 py-2">{{ $timesheet->getDurationAttribute() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

    </div>


    {{-- script for the creating tasks --}}
    <script>
        // Define startTime, endTime, timer and duration outside of event listeners
        var startTime;
        var duration = 0;
        var timer;
        var endTime;

        function formatTime(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var meridiem = "AM";
            if (hours > 12) {
                hours -= 12;
                meridiem = "PM";
            }
            return hours + ":" + padZero(minutes) + ":" + padZero(seconds) + " " + meridiem;
        }

        function padZero(num) {
            return num < 10 ? "0" + num : num;
        }

        // get the relevant elements
        const startTimerForm = document.getElementById('startTimerForm');
        const startTimerButton = document.getElementById('startTimerButton');
        const durationField = document.getElementById('duration');

        // when the Start Timer button is clicked


        // format the duration (in seconds) as HH:MM:SS
        function formatDuration(duration) {
            const hours = Math.floor(duration / 3600);
            const minutes = Math.floor(duration / 60) % 60;
            const seconds = duration % 60;
            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }


        // Start timer
        document.getElementById('startTimerButton').addEventListener('click', function() {
            // Capture the start time
            startTime = new Date();
            var startTimeString = formatTime(startTime);

            // Update the start time field
            document.getElementById('start_time').value = startTimeString;

            // start updating the duration field every second
            timer = setInterval(() => {
                // calculate the duration
                const duration = Math.floor((new Date() - startTime) / 1000);

                // update the duration field
                durationField.value = formatDuration(duration);
            }, 1000);

            // Hide the "Start Timer" button and show the "End Timer" button
            document.getElementById('startTimerButton').style.display = 'none';
            document.getElementById('endTimerButton').style.display = 'block';
        });

        // End timer
        document.getElementById('endTimerButton').addEventListener('click', function() {
            // Stop the timer from updating the duration field
            clearInterval(timer);

            // Capture the end time
            var endTime = new Date();
            var endTimeString = formatTime(endTime);

            // Calculate the duration
            var duration = Math.round((endTime.getTime() - startTime.getTime()) / 1000);

            // Update the end time field
            document.getElementById('end_time').value = endTimeString;

            // Update the duration field
            document.getElementById('duration').value = formatDuration(duration);

            // Hide the "End Timer" button and show the "Start Timer" button
            document.getElementById('endTimerButton').style.display = 'none';
            document.getElementById('startTimerButton').style.display = 'block';

            // Get the form data
            var formData = new FormData(startTimerForm);

            // Add the duration to the form data
            formData.append('duration', duration);

            //NOT YET WORKING
            // Send an AJAX request to submit the form data
            $.ajax({
                url: '/intern/timesheets/stop',
                processData: false,
                contentType: false,
                cache: false,
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Data submitted successfully!');
                    window.location.href = '/intern/timesheets/';
                },
                error: function(xhr, status, error) {
                    alert('Error submitting data. Please try again.');
                    console.log(xhr.responseText); // Log the error for debugging
                }
            });
        });
    </script>
</x-layout>
