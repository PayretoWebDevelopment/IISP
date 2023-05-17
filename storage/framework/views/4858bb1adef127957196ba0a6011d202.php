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
    <?php if(auth()->guard()->check()): ?>
    <li>
        <span class="font-bold uppercase">
            Welcome, <?php echo e(auth()->user()->name); ?>!
        </span>
    </li>
    <?php endif; ?>
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Summary of Activities for Today</h2>
        <?php if($timesheets->isEmpty()): ?>
        <p>No timesheets found for today.</p>
        <?php else: ?>
        <table>
            <?php $__currentLoopData = $timesheets->sortByDesc('start_time')->groupBy(function($entry) {
                return $entry->created_at->format('Y-m-d');
            }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr>

                    <td><?php echo e($timesheet->created_at); ?></td>
                    <td><?php echo e($timesheet->task_name); ?></td>
                    <td><?php echo e($timesheet->project_type); ?></td>
                    <td><?php echo e($timesheet->task_type); ?></td>
                    <td><?php echo e($timesheet->start_time->format('h:i A')); ?></td>
                    <td><?php echo e($timesheet->end_time ? $timesheet->end_time->format('h:i A') : ''); ?></td>
                    <td><?php echo e($timesheet->getDurationAttribute()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>


    <div style="width:40%;">
        <h3>Daily Intern Attendance Tracker</h3>
        <canvas id="attendanceTracker"></canvas>
    </div>

    
    <script>
        var ctx = document.getElementById('attendanceTracker').getContext('2d');
        var myPieChart = new Chart(ctx, {
                    type: 'pie'
                    , data: {
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\User\Downloads\IISP\resources\views/intern/dashboard.blade.php ENDPATH**/ ?>