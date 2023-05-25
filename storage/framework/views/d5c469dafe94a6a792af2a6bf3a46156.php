<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Reports']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Reports']); ?>
    <title>Payreto | Reports</title>
    <div class="container mx-auto">
        <h1 class="font-bold text-gray-700">Reports</h1>
        
        <section>
            <form method="get" action="/admin/reports/filter" class="mt-8">
                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <label for="start_date" class="text-gray-700 font-bold mb-2">From Date:</label>
                        <input type="date"
                            class="w-96 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40"
                            id="start_date" name="start_date"
                            value="<?php echo e(app('request')->input('start_date') ?? old('start_date')); ?>"
                            required>
                    </div>
                    <div class="flex-1">
                        <label for="end_date" class="text-gray-700 font-bold mb-2">To Date:</label>
                        <input type="date"
                            class="w-96 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40"
                            id="end_date" name="end_date"
                            value="<?php echo e(app('request')->input('end_date') ?? old('end_date')); ?>"
                            required>
                    </div>
                    <button type="submit"
                        class="block px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Apply
                        Filter</button>
                </div>
            </form>

            <form id="export_form" method="post" action="/admin/reports/export_selection">
                <?php echo csrf_field(); ?>
                <div class="flex justify-start mt-5">
                    <input type="hidden" name="start_date"
                        value="<?php echo e(app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d'))); ?>">
                    <input type="hidden" name="end_date"
                        value="<?php echo e(app('request')->input('end_date') ?? (old('start_date') ?? date('Y-m-d'))); ?>">
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-green-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_csv">Export to CSV</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-yellow-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_xlsx">Export to XLSX</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-red-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_pdf">Export to PDF</button>
                    </div>
                    <hr class="my-8">
                </div>
            </form>
        </section>
        
        
        <section>
            <div class="overflow-x-auto">
                <div>
                    <?php if($timesheetsByUser->isEmpty()): ?>
                        <p class="text-gray-700">No data found.</p>
                    <?php else: ?>
                        <div class="mt-10">
                            <table class="min-w-full divide-y divide-gray-200" id="reportList" style="width:100%">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            <span class="hidden"></span>
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Role
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Position
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Hourly Rate
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Hours Rendered
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $timesheetsByUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user => $timesheets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <input type="checkbox" name="timesheets[]" value=<?php echo e($user); ?>

                                                    form="export_form">
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->name); ?></td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->role); ?></td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->position); ?></td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->hourly_rate); ?></td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <?php echo e(floor($timesheetsByUser[$user]['total_hours_rendered'] / 3600) .
                                                    ':' .
                                                    floor(($timesheetsByUser[$user]['total_hours_rendered'] % 3600) / 60) .
                                                    ':' .
                                                    floor($timesheetsByUser[$user]['total_hours_rendered'] % 60)); ?>

                                            </td>
                                            <td class="m-auto">
                                                <form class="flex justify-center items-center" method="get"
                                                    action="/admin/reports/inspect/<?php echo e($user); ?>" class="mt-8">
                                                    <input type="hidden" name="start_date"
                                                        value="<?php echo e(app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d'))); ?>">
                                                    <input type="hidden" name="end_date"
                                                        value="<?php echo e(app('request')->input('end_date') ?? (old('end_date') ?? date('Y-m-d'))); ?>">
                                                    <div>
                                                        <button type="submit"
                                                            class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                            Inspect
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/admin/reports.blade.php ENDPATH**/ ?>