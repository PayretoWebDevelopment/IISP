<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <title>Payreto | Edit Employee Information</title>
    <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>
    <form action="/admin/employee-update/<?php echo e($employee->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Full Name:</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->name); ?>">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
            <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->username); ?>">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->email); ?>">
        </div>
        <div class="mb-4">
            <label for="contact_number" class="block text-gray-700 font-bold mb-2">Contact number:</label>
            <input type="number" name="contact_number" id="contact_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->contact_number); ?>">
        </div>
        <div class="mb-4">
            <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
            <input type="text" name="position" id="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->position); ?>">
        </div>
        <div class="mb-4">
            <label for="department" class="block text-gray-700 font-bold mb-2">Department (Dropdown):</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="department" required>
                <?php $__currentLoopData = $department_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($department); ?>" <?php echo e(($department == $employee->department) ? 'selected':''); ?>><?php echo e($department); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!--<input type="text" name="department" id="department" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->department); ?>">-->
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->start_date); ?>">
        </div>
        <div class="mb-4" id="active">
            <label for="active" class="block text-gray-700 font-bold mb-2">Active:</label>
            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="active"
                <?php echo e($employee->start_date ? 'checked' : ''); ?> value="1" <?php if(old('active') == 1): ?> checked <?php endif; ?> />
        </div>
        <?php if($role === 'superadmin'): ?>
        <div class="mb-4" id="hourly_rate">
            <label for="active" class="block text-gray-700 font-bold mb-2">Hourly rate:</label>
            <input type="number" name="hourly_rate" id="hourly_rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->hourly_rate); ?>" step="0.01">
        </div>
        <?php endif; ?>
        <div class="mb-4">
            <label for="required_hours" class="block text-gray-700 font-bold mb-2">Required Hours:</label>
            <input type="number" name="required_hours" id="required_hours" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->required_hours); ?>">
        </div>
        <div class="mb-4">
            <label for="bank" class="block text-gray-700 font-bold mb-2">Bank:</label>
            <input type="text" name="bank" id="bank" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->bank); ?>">
        </div>
        <div class="mb-4">
            <label for="bank_account_no" class="block text-gray-700 font-bold mb-2">Bank Account No:</label>
            <input type="number" name="bank_account_no" id="bank_account_no" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->bank_account_no); ?>">
        </div>
        <div class="mb-4">
            <label for="supervisor" class="block text-gray-700 font-bold mb-2">Name of supervisor:</label>
            <input type="text" name="supervisor" id="supervisor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->supervisor); ?>">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
            <a href="/admin/employee-list/" class="text-blue-500 hover:text-blue-700 font-bold">Cancel</a>
        </div>
    </form>

    <?php if($role === 'admin'): ?>
    <h1 class="text-2xl font-bold mb-4">Edit Employee Hourly Rate</h1>
    <form action="/admin/employee-edit-hourly-rate/<?php echo e($employee->id); ?>" method="POST" onsubmit="return validateForm()">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="hourly_rate" class="block text-gray-700 font-bold mb-2">Hourly rate:</label>
            <input type="number" name="hourly_rate" id="hourly_rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo e($employee->hourly_rate); ?>" step="0.01">
        </div>
        <div class="mb-4">
            <label for="reason" class="block text-gray-700 font-bold mb-2">Reason:</label>
            <input type="text" name="reason" id="reason" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Request change</button>
        </div>
    </form>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/employee-edit.blade.php ENDPATH**/ ?>