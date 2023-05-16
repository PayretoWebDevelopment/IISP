<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Timesheets Report</title>
</head>
<body>
    <h1>Timesheets Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
                <th>Project</th>
                <th>Task</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $duration = $timesheet->getDurationAttribute();
            ?>
            <tr>
                <td><?php echo e($timesheet->start_time->format('Y-m-d')); ?></td>
                <td><?php echo e($timesheet->project_type); ?></td>
                <td><?php echo e($timesheet->task_type); ?></td>
                <td><?php echo e($timesheet->start_time->format('h:i:s A')); ?></td>
                <td><?php echo e($timesheet->end_time->format('h:i:s A')); ?></td>
                <td><?php echo e($duration); ?></td>
                <td><?php echo e($timesheet->task_name); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/timesheets_pdf.blade.php ENDPATH**/ ?>