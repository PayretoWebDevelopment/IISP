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
        <h1 class="text-3xl font-bold">Report</h1>
        <form method="get" action="/admin/reports/filter" class="mt-8">
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
                        class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-blue-700 focus:outline-none 
                        focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">Apply
                        Filter</button>
                </div>
            </div>
        </form>
        <div class="flex mt-8">
            <form method="post" action="/admin/reports/export_selection">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="start_date" value="<?php echo e($start_date ?? date('Y-m-d')); ?>">
                <input type="hidden" name="end_date" value="<?php echo e($end_date ?? date('Y-m-d')); ?>">
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-green-500 
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_csv">Export to CSV</button>
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-yellow-500 
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_xlsx">Export to XLSX</button>
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-red-500 
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_pdf">Export to PDF</button>
                <hr class="my-8">
                <?php if($timesheets->isEmpty()): ?>
                    <p class="text-gray-700">No data found.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="py-2 px-4 font-bold uppercase"></th>
                                    <th class="py-2 px-4 font-bold uppercase">Name</th>
                                    <th class="py-2 px-4 font-bold uppercase">Role</th>
                                    <th class="py-2 px-4 font-bold uppercase">Position</th>
                                    <th class="py-2 px-4 font-bold uppercase">Hourly Rate</th>
                                    <th class="py-2 px-4 font-bold uppercase">Hours Rendered</th>
                                    <th class="py-2 px-4 font-bold uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <?php $__currentLoopData = $timesheetsByUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user => $timesheets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td><input type="checkbox" name="timesheets[]" value=<?php echo e($users[$user]->id); ?>></td>
                                        <td><?php echo e($users[$user]->name); ?></td>
                                        <td><?php echo e($users[$user]->role); ?></td>
                                        <td><?php echo e($users[$user]->position); ?></td>
                                        <td><?php echo e($users[$user]->hourly_rate); ?></td>
                                        <td><?php echo e(floor($timesheetsByUser[$user]['total_hours_rendered'] / 3600) 
                                        . ':' 
                                        . floor(($timesheetsByUser[$user]['total_hours_rendered'] % 3600) / 60) 
                                        . ':' 
                                        . floor(($timesheetsByUser[$user]['total_hours_rendered'] % 60))); ?></td>

                                        <td></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/reports.blade.php ENDPATH**/ ?>