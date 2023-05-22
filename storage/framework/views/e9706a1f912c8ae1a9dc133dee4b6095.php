<h2 class="font-bold mb-4">Superadmins</h2>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Role</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over superadmins and populate table rows -->
                <?php $__currentLoopData = $superadmins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superadmin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo e($superadmin->id); ?></td>
                        <td class="py-2 px-4 border hover:bg-blue-700"><a
                                href="/users/profile/<?php echo e($superadmin->id); ?>"><?php echo e($superadmin->name); ?></a></td>
                        <td class="py-2 px-4 border"><?php echo e($superadmin->role); ?></td>
                        <td class="py-2 px-4 border">
                            <?php if(auth()->user()->id == $superadmin->id): ?>
                            <a href="/admin/employee-edit/<?php echo e($superadmin->id); ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table><?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/superadmin-employee-list.blade.php ENDPATH**/ ?>