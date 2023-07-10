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
                
                <th class="py-2 px-4 font-bold uppercase">Duration</th>
                
                <th class="py-2 px-4 font-bold uppercase">Hourly rate</th>
                <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            <?php
                $groupedTimesheets = $timesheets->groupBy(function ($timesheet) {
                    return $timesheet->start_time->format('Y-m-d');
                });
            ?>
            <?php $__currentLoopData = $groupedTimesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $timesheetsByDate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td><?php echo e($date); ?></td>
                    
                    
                    <td>
                        <?php
                            $totalDurationInSeconds = $timesheetsByDate->sum(function ($timesheet) {
                                $duration = $timesheet->getBillableDurationAttribute();
                                [$hours, $minutes, $seconds] = explode(':', $duration);
                                $durationInSeconds = $hours * 3600 + $minutes * 60 + $seconds;
                                return $durationInSeconds;
                            });
                            
                            $totalDuration = gmdate('H:i:s', $totalDurationInSeconds);
                        ?>
                        <?php echo e($totalDuration); ?>

                    </td>
                    
                    <td><?php
                        $hourlyRate = $timesheetsByDate->first()->hourly_rate;
                    ?>
                        <?php echo e($hourlyRate); ?></td>
                    <td><?php
                        $array_time = (array) explode(':', $totalDuration);
                        //dd($array_time);
                        $hours = (int) $array_time[0];
                        $minutes = (int) $array_time[1];
                        $seconds = (int) $array_time[2];
                        
                        $total_hours = $hours + $minutes / 60 + $seconds / 3600;
                        $rate = number_format($hourlyRate * $total_hours, 2);
                    ?>
                        <?php echo e($rate); ?></td>
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