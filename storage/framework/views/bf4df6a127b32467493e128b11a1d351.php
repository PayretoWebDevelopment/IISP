<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
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
    <!-- Modal for starting time tracking -->
    <div class="modal fade bg-gray-200 p-5" id="startTimerModal" tabindex="-1" aria-labelledby="startTimerModalLabel" aria-hidden="true">
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
                            <label for="task_name" class="form-label">Task name</label>
                            <input name="task_name" id="task_name">
                        </div>

                        <div class="mb-3">
                            <label for="task_type" class="form-label">Task Type</label>
                            <select class="form-select" id="task_type" name="task_type" required>
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
                            <label for="project_type" class="form-label">Project Type</label>
                            <select class="form-select" id="project_type" name="project_type" required>
                                <option value="">Select Project Type</option>
                                <option value="Deep Dive Session">Deep Dive Session</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Debugging">Debugging</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="text" class="form-control" id="start_time" name="start_time" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="text" class="form-control" id="end_time" name="end_time" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="startTimerButton">Start Timer</button>
                    <button type="button" class="btn btn-secondary" id="endTimerButton" style="display: none;">End Timer</button>
                </div>
            </div>
        </div>
    </div>


    <div class="m-10 w-10/12">
        <h1>Recorded Entries</h1>
        <?php $__currentLoopData = $timesheets->groupBy(function($entry){
        return $entry->created_at->format('Y-m-d');
        })->sortByDesc(function ($entries, $date) {
        return $date;
        }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <h2><b><?php echo e($date); ?></b></h2>
        <table>
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
                <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($timesheet->created_at->format('Y-m-d')); ?></td>
                    <td><?php echo e($timesheet->task_name); ?></td>
                    <td><?php echo e($timesheet->project_type); ?></td>
                    <td><?php echo e($timesheet->task_type); ?></td>
                    <td><?php echo e($timesheet->start_time->format('H:i:s')); ?></td>
                    <td><?php echo e($timesheet->end_time ? $timesheet->end_time->format('H:i:s') : ''); ?></td>
                    <td><?php echo e($timesheet->getDurationAttribute()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    
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
                url: '/intern/timesheets/stop'
                , processData: false
                , contentType: false
                , cache: false
                , method: 'POST'
                , data: formData
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    alert('Data submitted successfully!');
                    window.location.href = '/intern/timesheets/';
                }
                , error: function(xhr, status, error) {
                    alert('Error submitting data. Please try again.');
                    console.log(xhr.responseText); // Log the error for debugging
                }
            });
        });

    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/intern/timesheets.blade.php ENDPATH**/ ?>