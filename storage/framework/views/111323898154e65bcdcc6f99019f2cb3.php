<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <title>Payreto | Employee List</title>
    <h1 class="text-2xl font-bold mb-4">Employee List</h1>
    <a href="/admin/create-new-employee"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Add Employee</a>
    <h2 class="font-bold mb-4">Interns</h2>
    <table class="min-w-full divide-y divide-gray-200" id="internList" style="width:100%">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Name
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Role
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Hourly Rate</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Required Hours</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Department</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Iterate over employees and populate table rows -->
            <?php $__currentLoopData = $interns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($intern->id); ?></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                            href="/users/profile/<?php echo e($intern->id); ?>"><?php echo e($intern->name); ?></a></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($intern->role); ?></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($intern->hourly_rate); ?>

                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <?php echo e($intern->required_hours); ?></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($intern->department); ?>

                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <a href="/admin/employee-edit/<?php echo e($intern->id); ?>"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                        <a href="/admin/employee-delete/<?php echo e($intern->id); ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                            onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this employee?')) {
                                        document.getElementById('delete-form-<?php echo e($intern->id); ?>').submit();
                                    }">Delete</a>
                        <form id="delete-form-<?php echo e($intern->id); ?>" action="/admin/employee-delete/<?php echo e($intern->id); ?>"
                            method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <h2 class="font-bold mb-4">Admins</h2>
    <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Name
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Role
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Iterate over employees and populate table rows -->
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($admin->id); ?></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                            href="/users/profile/<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?></a></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($admin->role); ?></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <a href="/admin/employee-edit/<?php echo e($admin->id); ?>"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                        <?php if($user_role === 'superadmin'): ?>
                            <a href="/admin/employee-delete/<?php echo e($admin->id); ?>"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                                onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this employee?')) {
                                        document.getElementById('delete-form-<?php echo e($admin->id); ?>').submit();
                                    }">Delete</a>
                            <form id="delete-form-<?php echo e($admin->id); ?>"
                                action="/admin/employee-delete/<?php echo e($admin->id); ?>" method="POST"
                                style="display: none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!--SUPERADMINS SECTION (CANNOT EDIT OR DELETE OTHER SUPERADMINS. CAN ONLY EDIT SELF)-->
    <?php if($user_role === 'superadmin'): ?>
        <?php echo $__env->make('admin.superadmin-employee-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/admin/employee-list.blade.php ENDPATH**/ ?>