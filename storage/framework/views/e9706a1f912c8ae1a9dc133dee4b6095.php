<section class="mt-10">
    <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
        <h2 class="font-semibold text-center mb-5">Superadmin List</h2>
        <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
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
                            Actions</th>
                    </tr>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Iterate over superadmins and populate table rows -->
                <?php $__currentLoopData = $superadmins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superadmin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($superadmin->id); ?></td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                                href="/users/profile/<?php echo e($superadmin->id); ?>"><?php echo e($superadmin->name); ?></a></td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"><?php echo e($superadmin->role); ?></td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            <?php if(auth()->user()->id == $superadmin->id): ?>
                            <a href="/admin/employee-edit/<?php echo e($superadmin->id); ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section><?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/superadmin-employee-list.blade.php ENDPATH**/ ?>