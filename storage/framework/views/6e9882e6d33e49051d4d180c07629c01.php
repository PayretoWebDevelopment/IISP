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
    <div class="container">
        <h1 class="font-bold text-gray-700">Reports</h1>
        
        <section>
            <form method="get" action="/admin/reports/filter" class="mt-8">
                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <label for="start_date" class="text-gray-700 font-semibold mb-2">From Date:</label>
                        <input type="date"
                            class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            id="start_date" name="start_date"
                            value="<?php echo e(app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d'))); ?>"
                            required>
                    </div>
                    <div class="flex-1">
                        <label for="end_date" class="text-gray-700 font-semibold mb-2">To Date:</label>
                        <input type="date"
                            class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            id="end_date" name="end_date"
                            value="<?php echo e(app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d'))); ?>"
                            required>
                    </div>
                    <button type="submit"
                        class="block px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
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
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            name="submit" value="export_csv"><i class="fa-solid fa-file-csv"></i> Export</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                            name="submit" value="export_xlsx"><i class="fa-solid fa-file-excel"></i> Export</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            name="submit" value="export_pdf"><i class="fa-solid fa-file-pdf"></i> Export</button>
                    </div>
                    <hr class="my-8">
                </div>
            </form>
        </section>
        
        
        <section>
            <div class="overflow-x-auto">
                <div class="">
                    <?php if($timesheetsByUser->isEmpty()): ?>
                        <p class="text-gray-700">No data found.</p>
                    <?php else: ?>
                        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
                            <table class="min-w-full divide-y divide-gray-200" id="reportList" style="width:100%">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="hidden"></span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Role
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Position
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hourly Rate
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hours Rendered
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $timesheetsByUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user => $timesheets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4">
                                                <input type="checkbox" name="timesheets[]" value=<?php echo e($user); ?>

                                                    form="export_form">
                                            </td>
                                            <td class="px-6 py-4">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->name); ?></td>
                                            <td class="px-6 py-4">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->role); ?></td>
                                            <td class="px-6 py-4">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->position); ?></td>
                                            <td class="px-6 py-4">
                                                <?php echo e($timesheetsByUser[$user]['userReference']->hourly_rate); ?></td>
                                            <td class="px-6 py-4">
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
                                                            class="px-6 py-2 font-medium tracking-wide text-white transition-colors duration-300 transform bg-zinc-600 rounded-lg hover:bg-zinc-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                            <i class="fa-solid fa-eye"></i> View
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
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/reports.blade.php ENDPATH**/ ?>