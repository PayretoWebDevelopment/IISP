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
        <h1 class="text-3xl font-bold">Timesheet Report</h1>
        <form method="get" action="/intern/reports/filter" class="mt-8">
            <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                <div class="flex-1">
                    <label for="start_date" class="block text-gray-700 font-bold mb-2">From Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="start_date"
                        name="start_date" value="<?php echo e(old('start_date')); ?>" required>
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-gray-700 font-bold mb-2">To Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="end_date" name="end_date"
                        value="<?php echo e(old('end_date')); ?>" required>
                </div>
                <div>
                    <button type="submit"
                        class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">Apply
                        Filter</button>
                </div>
                
            </div>
        </form>
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
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
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
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/intern/reports.blade.php ENDPATH**/ ?>