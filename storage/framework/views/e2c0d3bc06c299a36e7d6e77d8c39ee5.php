<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h1 class="text-2xl font-bold mb-4">Employee List</h1>
    <a href="/admin/create-new-employee"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Add Employee</a>
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Role</th>
                <th class="py-2 px-4 border">Hourly Rate</th>
                <th class="py-2 px-4 border">Required Hours</th>
                <th class="py-2 px-4 border">Department</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate over employees and populate table rows -->
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="py-2 px-4 border"><?php echo e($employee->id); ?></td>
                    <td class="py-2 px-4 border hover:bg-blue-700"><a href="/users/profile/<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></a></td>
                    <td class="py-2 px-4 border"><?php echo e($employee->role); ?></td>
                    <td class="py-2 px-4 border"><?php echo e($employee->hourly_rate); ?></td>
                    <td class="py-2 px-4 border"><?php echo e($employee->required_hours); ?></td>
                    <td class="py-2 px-4 border"><?php echo e($employee->department); ?></td>
                    <td class="py-2 px-4 border">
                        <a href="/admin/employee-edit/<?php echo e($employee->id); ?>"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                        <a href="/admin/employee-delete/<?php echo e($employee->id); ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                            onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this employee?')) {
                                        document.getElementById('delete-form-<?php echo e($employee->id); ?>').submit();
                                    }">Delete</a>
                        <form id="delete-form-<?php echo e($employee->id); ?>"
                            action="/admin/employee-delete/<?php echo e($employee->id); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/employee-list.blade.php ENDPATH**/ ?>