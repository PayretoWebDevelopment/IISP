<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Approvals']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Approvals']); ?>
    <title>Payreto | Approvals</title>
    <h1 class="text-2xl font-bold mb-4">Edit Request List</h1>
    <h2 class="text-lg font-bold mb-2">Pending Requests</h2>
    <?php if($approvals->isEmpty()): ?>
        <p>No pending requests found.</p>
    <?php else: ?>
        <form method="POST" action="/admin/approve-requests">
            <?php echo csrf_field(); ?>
            <div class="relative overflow-x-auto bg-white border border-gray-200 rounded-lg shadow p-5">
                <table class=" table-auto divide-gray-200" id="pendingRequestList" style="width:100%">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-sm font-normal text-left text-gray-500">Requestor
                            </th>
                            <th class="text-sm font-normal text-left text-gray-500">Profile
                                to Edit</th>
                            <th class="text-sm font-normal text-left text-gray-500">Value to
                                Edit</th>
                            <th class="text-sm font-normal text-left text-gray-500">From
                            </th>
                            <th class="text-sm font-normal text-left text-gray-500">To</th>
                            <th class="text-sm font-normal text-left text-gray-500">Reason
                            </th>
                            <th class="text-sm font-normal text-left text-gray-500">Approve?
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Iterate over approvals and populate table rows -->
                        <?php $__currentLoopData = $approvals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php echo e($approval->requestor->name); ?></td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php echo e($approval->profile->name); ?></td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php echo e($approval->field_to_edit); ?></td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php echo e($approval->original_value); ?></td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php echo e($approval->modified_value); ?></td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <p class="break-words"><?php echo e($approval->reason); ?></p>
                                </td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <?php
                                        $options = [
                                            1 => 'Yes',
                                            0 => 'No',
                                            null => 'Ignore',
                                        ];
                                    ?>
                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                            <input type="radio" class="form-radio"
                                                name="approval[<?php echo e($approval->id); ?>]" value="<?php echo e($value); ?>"
                                                <?php echo e($approval->approve == $value ? 'checked' : ''); ?>>
                                            <span class="ml-2"><?php echo e($label); ?></span>
                                        </label>
                                        <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Approve
                    pending requests</button>
            </div>
        </form>
    <?php endif; ?>

    
    <h2 class="text-lg font-bold my-2">Approved Requests</h2>
    <?php if($approvedRequests->isEmpty()): ?>
        <p>No approved requests found.</p>
    <?php else: ?>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Requestor</th>
                    <th class="py-2 px-4 border">Profile to Edit</th>
                    <th class="py-2 px-4 border">Value to Edit</th>
                    <th class="py-2 px-4 border">From</th>
                    <th class="py-2 px-4 border">To</th>
                    <th class="py-2 px-4 border">Reason</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over approved requests and populate table rows -->
                <?php $__currentLoopData = $approvedRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo e($approval->requestor->name); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->profile->name); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->field_to_edit); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->original_value); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->modified_value); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->reason); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h2 class="text-lg font-bold my-2">Unapproved Requests</h2>
    <?php if($unapprovedRequests->isEmpty()): ?>
        <p>No unapproved requests found.</p>
    <?php else: ?>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Requestor</th>
                    <th class="py-2 px-4 border">Profile to Edit</th>
                    <th class="py-2 px-4 border">Value to Edit</th>
                    <th class="py-2 px-4 border">From</th>
                    <th class="py-2 px-4 border">To</th>
                    <th class="py-2 px-4 border">Reason</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over unapproved requests and populate table rows -->
                <?php $__currentLoopData = $unapprovedRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo e($approval->requestor->name); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->profile->name); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->field_to_edit); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->original_value); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->modified_value); ?></td>
                        <td class="py-2 px-4 border"><?php echo e($approval->reason); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/admin/approvals.blade.php ENDPATH**/ ?>