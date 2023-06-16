<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Timesheets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Timesheets']); ?>
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
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="task_name" class="block text-gray-700 font-bold mb-2">Task name</label>
                            <input name="task_name" id="task_name"
                                class="border border-gray-400 rounded w-full py-2 px-3 timesheetField" />
                        </div>

                        <div class="mb-3">
                            <label for="task_type" class="block text-gray-700 font-bold mb-2">Task Type</label>
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3 timesheetField" id="task_type"
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
                            <select class="form-select border border-gray-400 rounded w-full py-2 px-3 timesheetField"
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
                                    <option value="Web Development: Programming and Development">Programming and
                                        Development</option>
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

    <div class="m-10 w-10/12">
        <h1 class="text-3xl font-bold">Recorded Entries</h1>
        <?php $__currentLoopData = $timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
        return $entry->start_time->format('Y-m-d');
    }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-2xl font-bold mt-6"><b><?php echo e($date); ?></b></h2>
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
                        <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo e($timesheet->start_time->format('Y-m-d')); ?></td>
                                <td class="border px-4 py-2"><?php echo e($timesheet->task_name); ?></td>
                                <td class="border px-4 py-2"><?php echo e($timesheet->project_type); ?></td>
                                <td class="border px-4 py-2"><?php echo e($timesheet->task_type); ?></td>
                                <td class="border px-4 py-2"><?php echo e($timesheet->start_time->format('H:i:s')); ?></td>
                                <td class="border px-4 py-2">
                                    <?php echo e($timesheet->end_time ? $timesheet->end_time->format('H:i:s') : ''); ?></td>
                                <td class="border px-4 py-2"><?php echo e($timesheet->getDurationAttribute()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


    
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
        }

        // Save the form fields in local storage
        function saveFormFields() {
            var taskName = document.getElementById('task_name').value;
            var taskType = document.getElementById('task_type').value;
            var projectType = document.getElementById('project_type').value;

            localStorage.setItem('taskName', taskName);
            localStorage.setItem('taskType', taskType);
            localStorage.setItem('projectType', projectType);
        }

        // Update the duration field
        function updateTimer() {
            duration++;
            localStorage.setItem('startTime', startTime);
            localStorage.setItem('duration', duration);
            document.getElementById('duration').value = formatDuration(duration);
        }

        // Stop the timer and clear the stored data
        function stopTimer() {
            clearInterval(timer);
            localStorage.removeItem('startTime');
            localStorage.removeItem('duration');
            localStorage.removeItem('taskName');
            localStorage.removeItem('taskType');
            localStorage.removeItem('projectType');
            var endTime = new Date();
            var endTimeString = formatTime(endTime);
            var duration = Math.round((endTime.getTime() - startTime.getTime()) / 1000);
            document.getElementById('end_time').value = endTimeString;
            document.getElementById('duration').value = formatDuration(duration);
            document.getElementById('endTimerButton').style.display = 'none';
            document.getElementById('startTimerButton').style.display = 'block';
            submitFormData(duration);
        }

        // Submit the form data
        function submitFormData(duration) {
            var formData = new FormData(startTimerForm);
            formData.append('duration', duration);
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
            field => {field.addEventListener('change', saveFormFields)}
        );
        
    </script>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/intern/timesheets.blade.php ENDPATH**/ ?>