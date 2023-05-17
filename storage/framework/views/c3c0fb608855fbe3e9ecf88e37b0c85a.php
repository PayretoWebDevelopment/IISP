<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Timesheets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Timesheets']); ?>

    <div class="m-10 w-10/12">
        <h1 class="text-3xl font-bold">Recorded Entries for <?php echo e($user->name); ?></h1>
        <div class="flex mt-8">
            
        </div>
        <hr class="my-8">
        <?php if($timesheets->isEmpty()): ?>
            <p class="text-gray-700">No data found.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 font-bold uppercase">Date</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Name</th>
                            <th class="py-2 px-4 font-bold uppercase">Project Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                            <th class="py-2 px-4 font-bold uppercase">End Time</th>
                            <th class="py-2 px-4 font-bold uppercase">Duration</th>
                            <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td><?php echo e($timesheet->start_time->format('Y-m-d')); ?></td>
                                <td><?php echo e($timesheet->task_name); ?></td>
                                <td><?php echo e($timesheet->project_type); ?></td>
                                <td><?php echo e($timesheet->task_type); ?></td>
                                <td><?php echo e($timesheet->start_time->format('h:i A')); ?></td>
                                <td><?php echo e($timesheet->end_time ? $timesheet->end_time->format('h:i A') : ''); ?></td>
                                <td><?php echo e($timesheet->getDurationAttribute()); ?></td>
                                <td><?php echo e($timesheet->rate); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?><?php /**PATH C:\Users\User\Downloads\IISP\resources\views/admin/inspect.blade.php ENDPATH**/ ?>