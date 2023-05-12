<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Reports']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Reports']); ?>
<div class="container">
    <h1>Timesheet Report</h1>
        <form method="get" action="/intern/reports/filter">
            <div class="form-group">
                <label for="start_date">From Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo e(old('start_date')); ?>" required>
            </div>
            <div class="form-group">
                <label for="end_date">To Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filter</button>
            
        </form>

    <hr>
    <?php if($timesheets->isEmpty()): ?>
            <p>No data found.</p>
    <?php else: ?>
    <table class="table">
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
            <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($timesheet->created_at->format('Y-m-d')); ?></td>
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
    <?php endif; ?>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\User\Downloads\IISP\resources\views/intern/reports.blade.php ENDPATH**/ ?>