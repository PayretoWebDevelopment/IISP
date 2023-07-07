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
                                class="border border-gray-400 rounded w-full py-2 px-3 timesheetField" />
                        </div>

                        <div class="mb-3">
                            <label for="task_type" class="block text-gray-700 font-bold mb-2">Task Type</label>
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3 timesheetField" id="task_type" name="task_type" required>
                                <option value="">Select Task Type</option>
                                @foreach($taskTypes as $taskType)
                                    <option value="{{ $taskType->name }}">{{ $taskType->name }}</option>
                                @endforeach
                            </select>                            
                        </div>
                        <div class="mb-3">
                            <label for="project_type" class="block text-gray-700 font-bold mb-2">Project Type</label>
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3 timesheetField" id="project_type" name="project_type" required>
                                <option value="">Select Project Type</option>
                                @foreach($projectTypes as $projectType)
                                    @if ($loop->first || $projectType->department !== $prevDepartment)
                                        @if (!$loop->first)
                                            </optgroup>
                                        @endif
                                        <optgroup label="{{ $projectType->department }}">
                                    @endif
                                    <option value="{{ $projectType->department }}: {{ $projectType->name }}">{{ $projectType->name }}</option>
                                    @php
                                        $prevDepartment = $projectType->department;
                                    @endphp
                                    @if ($loop->last)
                                        </optgroup>
                                    @endif
                                @endforeach
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
                        <div class="mb-3">
                            <label class="block text-gray-700 font-bold mb-2" for="billable">Billable</label>
                            <div class="flex items-center">
                                <input type="checkbox" id="billable" name="billable" class="mr-2 timesheetField">
                                <span id="billableIcon" class="ml-2 text-green-500 hidden cursor-pointer"
                                    onclick="toggleBillable()">$</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        id="startTimerButton">Start Timer</button>
                    <button type="button"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        id="endTimerButton" style="display: none;">End Timer</button>
                </div>
            </div>
        </div>
    </div>

    @php
        $currentWeek = date('Y-W');
        $weekTotal = 0; // Initialize week total
        $weekBillableTotal = 0;
    @endphp

    <div class="m-10 w-10/12">
        <h1 class="text-3xl font-bold">Recorded Entries</h1>
        @foreach ($timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
        return $entry->start_time->format('Y-W'); // Group by year and week
    }) as $week => $weekEntries)
            @php
                $startDate = $weekEntries
                    ->first()
                    ->start_time->startOfWeek()
                    ->format('Y-m-d');
                $endDate = $weekEntries
                    ->last()
                    ->start_time->endOfWeek()
                    ->format('Y-m-d');
                $isCurrentWeek = $week === $currentWeek;
                $weekTotal = 0; // Reset week total for each week
                $weekBillableTotal = 0;
            @endphp
            <h2 class="text-2xl font-bold mt-6"><b>{{ date('F d, Y', strtotime($startDate)) }} to {{ date('F d, Y', strtotime($endDate)) }}
            </b></h2>
            @foreach ($weekEntries->groupBy(function ($entry) {
        return $entry->start_time->format('Y-m-d'); // Group by year, month, and day
    }) as $date => $entries)
                <h3 class="text-xl font-bold mt-4"><b>{{ $date }}</b></h3>
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
                                <th class="border px-4 py-2">Billable</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dayTotal = 0; // Initialize day total
                                $billableDayTotal = 0;
                            @endphp
                            @foreach ($entries as $timesheet)
                                <tr>
                                    <td class="border px-4 py-2">{{ $timesheet->start_time->format('Y-m-d') }}</td>
                                    <td class="border px-4 py-2">{{ $timesheet->task_name }}</td>
                                    <td class="border px-4 py-2">{{ $timesheet->project_type }}</td>
                                    <td class="border px-4 py-2">{{ $timesheet->task_type }}</td>
                                    <td class="border px-4 py-2">{{ $timesheet->start_time->format('H:i:s') }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $timesheet->end_time ? $timesheet->end_time->format('H:i:s') : '' }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $timesheet->getDurationAttribute() }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($timesheet->billable)
                                            <span class="text-green-500 font-bold">&#36;</span>
                                        @else
                                            <span class="text-red-500 font-bold">&#10007;</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Day total calculation script -->

                                @php
                                    $duration = $timesheet->getDurationAttribute();
                                    if ($duration) {
                                        $durationParts = explode(':', $duration);
                                        $hours = intval($durationParts[0]);
                                        $minutes = intval($durationParts[1]);
                                        $seconds = intval($durationParts[2]);
                                        $durationInSeconds = $hours * 3600 + $minutes * 60 + $seconds;
                                        $weekTotal += $durationInSeconds; // Add duration to week total in seconds
                                        if($timesheet->billable){$weekBillableTotal += $durationInSeconds;}
                                        if ($isCurrentWeek && $date === \Carbon\Carbon::now()->format('Y-m-d')) {
                                            $dayTotal += $durationInSeconds; // Add duration to day total in seconds
                                            if($timesheet->billable){ $billableDayTotal += $durationInSeconds; }
                                        }
                                    }
                                @endphp
                            @endforeach

                            <!-- Day total row -->
                            @if ($isCurrentWeek && count($entries) > 0)
                                <tr>
                                    <td class="border px-4 py-2" colspan="6"><b>Day Total</b></td>
                                    @php
                                        $dayTotalHours = floor($dayTotal / 3600);
                                        $dayTotalMinutes = floor(($dayTotal % 3600) / 60);
                                        $dayTotalSeconds = $dayTotal % 60;
                                        $dayTotalFormatted = sprintf('%02d:%02d:%02d', $dayTotalHours, $dayTotalMinutes, $dayTotalSeconds);
                                    @endphp
                                    <td class="border px-4 py-2"><b>{{ $dayTotalFormatted }}</b></td>
                                    <td class="border px-4 py-2"></td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2" colspan="6"><b>Total Billable Hours</b></td>
                                    @php
                                        $billableDayTotalHours = floor($billableDayTotal / 3600);
                                        $billableDayTotalMinutes = floor(($billableDayTotal % 3600) / 60);
                                        $billableDayTotalSeconds = $billableDayTotal % 60;
                                        $billableDayTotalFormatted = sprintf('%02d:%02d:%02d', $billableDayTotalHours, $billableDayTotalMinutes, $billableDayTotalSeconds);
                                    @endphp
                                    <td class="border px-4 py-2"><b>{{ $billableDayTotalFormatted }}</b></td>
                                    <td class="border px-4 py-2"></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            @endforeach
            <h3 class="text-xl font-bold mt-4"><b>Week Total</b></h3>
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Week</th>
                            <th class="border px-4 py-2">Total</th>
                            <th class="border px-4 py-2">Total Billable</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $startDate }} to {{ $endDate }}</td>
                            @php
                                $weekTotalHours = floor($weekTotal / 3600);
                                $weekTotalMinutes = floor(($weekTotal % 3600) / 60);
                                $weekTotalSeconds = $weekTotal % 60;
                                $weekTotalFormatted = sprintf('%02d:%02d:%02d', $weekTotalHours, $weekTotalMinutes, $weekTotalSeconds);

                                //Billable
                                $weekBillableTotalHours = floor($weekBillableTotal / 3600);
                                $weekBillableTotalMinutes = floor(($weekBillableTotal % 3600) / 60);
                                $weekBillableTotalSeconds = $weekBillableTotal % 60;
                                $weekBillableTotalFormatted = sprintf('%02d:%02d:%02d', $weekBillableTotalHours, $weekBillableTotalMinutes, $weekBillableTotalSeconds);
                            @endphp
                            <td class="border px-4 py-2"><b>{{ $weekTotalFormatted }}</b></td>
                            <td class="border px-4 py-2"><b>{{ $weekBillableTotalFormatted }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    {{-- script for the creating tasks --}}
    <script>
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

        function formatDuration(duration) {
            const hours = Math.floor(duration / 3600);
            const minutes = Math.floor(duration / 60) % 60;
            const seconds = duration % 60;
            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        // Update the duration field and start the timer
        function startTimer() {
            timer = setInterval(updateTimer, 1000);
            // Store the start time as a string in local storage
            localStorage.setItem('startTime', startTime.toString());
            document.getElementById('startTimerButton').style.display = 'none';
            document.getElementById('endTimerButton').style.display = 'block';
        }

        // Restore the timer if it was previously running
        function restoreTimer() {
            var storedStartTime = localStorage.getItem('startTime');
            if (storedStartTime) {
                startTime = new Date(storedStartTime); // Parse the stored start time back to a Date object
                var currentTime = new Date();
                duration = Math.floor((currentTime - startTime) / 1000);
                updateTimer();
                startTimer();
            }
        }

        // Toggle billable state
        function toggleBillable(value) {
            var billableCheckbox = document.getElementById('billable');
            var billableIcon = document.getElementById('billableIcon');
            billableCheckbox.checked = value ? 1 : 0;

            if (value) {
                billableIcon.classList.remove('hidden');
            } else {
                billableIcon.classList.add('hidden');
            }
        }


        // Restore the form fields if they were previously filled
        function restoreFormFields() {
            var storedTaskName = localStorage.getItem('taskName');
            if (storedTaskName) {
                document.getElementById('task_name').value = storedTaskName;
            }

            var storedTaskType = localStorage.getItem('taskType');
            if (storedTaskType) {
                document.getElementById('task_type').value = storedTaskType;
            }

            var storedProjectType = localStorage.getItem('projectType');
            if (storedProjectType) {
                document.getElementById('project_type').value = storedProjectType;
            }

            var storedBillable = localStorage.getItem('billable');
            var billableCheckbox = document.getElementById('billable');
            var billableIcon = document.getElementById('billableIcon');

            if (storedBillable === '1') {
                billableCheckbox.checked = true;
                billableIcon.classList.remove('hidden');
            } else {
                billableCheckbox.checked = false;
                billableIcon.classList.add('hidden');
            }

        }

        // Save the form fields in local storage
        function saveFormFields() {
            var taskName = document.getElementById('task_name').value;
            var taskType = document.getElementById('task_type').value;
            var projectType = document.getElementById('project_type').value;

            localStorage.setItem('taskName', taskName);
            localStorage.setItem('taskType', taskType);
            localStorage.setItem('projectType', projectType);

            var stopTimerButton = document.getElementById('endTimerButton');
            if (taskName.trim() === '' || taskType.trim() === '' || projectType.trim() === '') {
                stopTimerButton.disabled = true;
            } else {
                stopTimerButton.disabled = false;
            }

            var billableCheckbox = document.getElementById('billable');
            var billable = billableCheckbox.checked ? 1 : 0;
            localStorage.setItem('billable', billable);

        }

        // Update the duration field
        function updateTimer() {
            duration++;
            localStorage.setItem('startTime', startTime);
            localStorage.setItem('duration', duration);
            document.getElementById('duration').value = formatDuration(duration);

            // Get the current time
            var currentTime = new Date();
            var currentDateTime = new Date(currentTime.getFullYear(), currentTime.getMonth(), currentTime.getDate(), 0, 0,
                0);

            // Calculate the end time for the current day
            var endTimeToday = new Date(startTime.getFullYear(), startTime.getMonth(), startTime.getDate(), 23, 59, 59);

            // If the current time exceeds the end time for the current day
            if (currentTime > endTimeToday) {
                stopTimer();
            }
        }

        function stopTimer() {
            // Check if the form fields are empty
            var taskName = document.getElementById('task_name').value;
            var taskType = document.getElementById('task_type').value;
            var projectType = document.getElementById('project_type').value;

            if (taskName.trim() === '' || taskType.trim() === '' || projectType.trim() === '') {
                alert('Please fill in all the form fields before stopping the timer.');
                return; // Prevent the timer from stopping if form fields are empty
            }

            clearInterval(timer);
            localStorage.removeItem('startTime');
            localStorage.removeItem('duration');
            localStorage.removeItem('taskName');
            localStorage.removeItem('taskType');
            localStorage.removeItem('projectType');
            localStorage.removeItem('billable');
            var endTime = new Date();
            var endTimeString = formatTime(endTime);
            var duration = Math.round((endTime.getTime() - startTime.getTime()) / 1000);
            document.getElementById('end_time').value = endTimeString;
            document.getElementById('duration').value = formatDuration(duration);
            document.getElementById('endTimerButton').style.display = 'none';
            document.getElementById('startTimerButton').style.display = 'block';
            submitFormData(duration);
        }

        // Toggle billable state
        function toggleBillable() {
            var billableCheckbox = document.getElementById('billable');
            var billableIcon = document.getElementById('billableIcon');
            if (billableCheckbox.checked) {
                billableIcon.classList.remove('hidden');
                billableIcon.textContent = '$';
            } else {
                billableIcon.classList.add('hidden');
                billableIcon.textContent = '';
            }
        }

        // Add an event listener to the billable checkbox
        document.getElementById('billable').addEventListener('change', toggleBillable);


        function submitFormData(duration) {
            var formData = new FormData(startTimerForm);
            formData.append('duration', duration);
            // Get the checkbox element
            var billableCheckbox = document.getElementById('billable');

            // Set the billable value based on the checkbox state
            var billableValue = billableCheckbox.checked ? '1' : '0';
            formData.append('billable', billableValue);
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
                    console.log(xhr.responseText);

                    // Handle the form error here
                    if (xhr.status === 400) {
                        // Form error occurred
                        alert('Form error! Please fix the form.');
                        return; // Prevent the timer from stopping if there is a form error
                    }

                    // Handle other error cases if needed
                }
            });
        }

        // Initialize the timer
        function initializeTimer() {
            var storedDuration = localStorage.getItem('duration');
            duration = storedDuration ? parseInt(storedDuration) : 0;

            if (storedDuration) {
                duration = parseInt(storedDuration);
                document.getElementById('duration').value = formatDuration(duration);
            }

            var storedStartTime = localStorage.getItem('startTime');
            if (storedStartTime) {
                startTime = new Date(storedStartTime);
                var startTimeString = formatTime(startTime);
                document.getElementById('start_time').value = startTimeString;
            }

            var startTimerButton = document.getElementById('startTimerButton');
            var endTimerButton = document.getElementById('endTimerButton');

            if (duration > 0) {
                startTimerButton.style.display = 'none';
                endTimerButton.style.display = 'block';
            } else {
                startTimerButton.style.display = 'block';
                endTimerButton.style.display = 'none';
            }
            restoreFormFields();
        }

        // Handle the Start Timer button click
        document.getElementById('startTimerButton').addEventListener('click', function() {
            startTime = new Date();
            var startTimeString = formatTime(startTime);
            document.getElementById('start_time').value = startTimeString;
            startTimer();
            saveFormFields();
        });

        // Handle the End Timer button click
        document.getElementById('endTimerButton').addEventListener('click', function() {
            stopTimer();
        });

        // Restore the timer on page load
        window.addEventListener('load', function() {
            restoreTimer();
            initializeTimer();
        });

        var timesheetFields = document.querySelectorAll('.timesheetField');
        timesheetFields.forEach(
            field => {
                field.addEventListener('change', saveFormFields);
            }
        );
    </script>

</x-layout>
