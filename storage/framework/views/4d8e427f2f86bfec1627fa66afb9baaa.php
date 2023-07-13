<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Dashboard']); ?>
    <title>Payreto | User Dashboard</title>
    <div class="container">
        
        <?php if(auth()->guard()->check()): ?>
            <h1 class="text-base font-semibold italic text-gray-700 mt-6">
                Welcome, <?php echo e(auth()->user()->name); ?>!
            </h1>
        <?php endif; ?>
        <h2 class="text-l font-bold mt-6">Summary of Activities for Today</h2>
        <?php if($timesheets->isEmpty()): ?>
            <p>No timesheets found for today.</p>
        <?php else: ?>
            <div
                class="transform hover:scale-105 transition duration-300 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <?php $__currentLoopData = $timesheets->sortByDesc('start_time')->groupBy(function ($entry) {
        return $entry->created_at->format('Y-m-d');
    }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <thead class="text-xs text-white uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Task Name</th>
                                <th scope="col" class="px-6 py-3">Project Type</th>
                                <th scope="col" class="px-6 py-3">Task Type</th>
                                <th scope="col" class="px-6 py-3">Start Time</th>
                                <th scope="col" class="px-6 py-3">End Time</th>
                                <th scope="col" class="px-6 py-3">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4"><?php echo e($timesheet->created_at); ?></td>
                                    <td class="px-6 py-4"><?php echo e($timesheet->task_name); ?></td>
                                    <td class="px-6 py-4"><?php echo e($timesheet->project_type); ?></td>
                                    <td class="px-6 py-4"><?php echo e($timesheet->task_type); ?></td>
                                    <td class="px-6 py-4"><?php echo e($timesheet->start_time->format('h:i A')); ?></td>
                                    <td class="px-6 py-4">
                                        <?php echo e($timesheet->end_time ? $timesheet->end_time->format('h:i A') : ''); ?></td>
                                    <td class="px-6 py-4"><?php echo e($timesheet->getDurationAttribute()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>


    <div class="grid grid-cols-2 gap-4 mt-5">
        <div class="text-center">
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                <h3 class="font-bold">Daily Intern Attendance Tracker</h3>
                <canvas id="attendanceTracker"></canvas>
            </div>
        </div>
        <div class="text-center">
            <div class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg border p-6 bg-white">
                <h3 class="font-bold">Department Intern Attendance Tracker</h3>
                <canvas id="departmentTracker"></canvas>
            </div>
        </div>
    </div>

    
    <script>
        var ctx = document.getElementById('attendanceTracker').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Timed In', 'Not Timed In'],
                datasets: [{
                    backgroundColor: ['#36a2eb', '#ff6384'],
                    data: [<?php echo e($timedInPercentage); ?>, <?php echo e($notTimedInPercentage); ?>]
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
    
    <script>
        var departmentTracker = document.getElementById('departmentTracker').getContext('2d');
        var myPieChart = new Chart(departmentTracker, {
            type: 'bar',
            data: {
                labels: ['Technology', 'People', 'Operations', 'BizDev'],
                datasets: [{
                    backgroundColor: ['#36a2eb', '#ff6384', '#ff3112', '#f31234'],
                    data: [
                        <?php echo e($technologyCount); ?>,
                        <?php echo e($peopleCount); ?>,
                        <?php echo e($opsCount); ?>,
                        <?php echo e($bizdevCount); ?>

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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/intern/dashboard.blade.php ENDPATH**/ ?>