<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Timesheets Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>Timesheets Report</h1>
    <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 font-bold uppercase">Date</th>
                <th class="py-2 px-4 font-bold uppercase">Project</th>
                <th class="py-2 px-4 font-bold uppercase">Task</th>
                <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                <th class="py-2 px-4 font-bold uppercase">End Time</th>
                <th class="py-2 px-4 font-bold uppercase">Duration</th>
                <th class="py-2 px-4 font-bold uppercase">Description</th>
                <th class="py-2 px-4 font-bold uppercase">Hourly rate</th>
                <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td><?php echo e($timesheet->start_time->format('Y-m-d')); ?></td>
                    <td><?php echo e($timesheet->project_type); ?></td>
                    <td><?php echo e($timesheet->task_type); ?></td>
                    <td><?php echo e($timesheet->start_time->format('h:i:s A')); ?></td>
                    <td><?php echo e($timesheet->end_time ? $timesheet->end_time->format('h:i:s A') : ''); ?></td>
                    <td><?php echo e($timesheet->getBillableDurationAttribute()); ?></td>
                    <td><?php echo e($timesheet->task_name); ?></td>
                    <td><?php echo e($timesheet->hourly_rate); ?></td>
                    <td><?php echo e($timesheet->rate); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr class="bg-gray-200 text-gray-700">
                <th colspan="7"></th>
                <th>Total</th>
                <th><?php echo e($totalAllowance); ?></th>
            </tr>
        </tfoot>
        
    </table>
</body>
</html>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/intern/timesheets_pdf.blade.php ENDPATH**/ ?>