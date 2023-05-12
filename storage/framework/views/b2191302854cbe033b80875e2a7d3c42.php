<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <title>Payreto IISP | Create new User</title>

    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a new employee</h2>
    </header>

    <form method="POST" action="/admin/create-new-employee/submit">
        <?php echo csrf_field(); ?>
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2"> Full name </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" id="name" name="name"
                value="<?php echo e(old('name')); ?>" />

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="username" class="inline-block text-lg mb-2">Username</label>
            <input type="username" class="border border-gray-200 rounded p-2 w-full" id="username" name="username"
                value="<?php echo e(old('username')); ?>" />

            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" id="email" name="email"
                value="<?php echo e(old('email')); ?>" />

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="" />

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
                Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                value="" />

            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="role" class="inline-block text-lg mb-2">Role</label>
            <select class="form-select border border-gray-200 rounded p-2 w-full" id="role" name="role"
                required>
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Intern">Intern</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="contact_number" class="inline-block text-lg mb-2">Contact number</label>
            <input type="contact_number" class="border border-gray-200 rounded p-2 w-full" id="contact_number" name="contact_number"
                value="<?php echo e(old('contact_number')); ?>" />

            <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="position" class="inline-block text-lg mb-2">Position</label>
            <input type="position" class="border border-gray-200 rounded p-2 w-full" name="position"
                value="<?php echo e(old('position')); ?>" />

            <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <label for="department" class="inline-block text-lg mb-2">Department</label>
            <input type="department" class="border border-gray-200 rounded p-2 w-full" name="department"
                value="<?php echo e(old('department')); ?>" />

            <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="start_date" >
            <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
            <input type="start_date" class="border border-gray-200 rounded p-2 w-full" name="start_date"
                value=""<?php echo e(old('start_date')); ?> />

            <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="active">
            <label for="active" class="inline-block text-lg mb-2">Active</label>
            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="active"
                <?php echo e(old('active') ? 'checked' : ''); ?> value="1" <?php if(old('active') == 1): ?> checked <?php endif; ?> />

            <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="mb-6" id="hourly_rate">
            <label for="hourly_rate" class="inline-block text-lg mb-2">Hourly rate</label>
            <input type="hourly_rate" class="border border-gray-200 rounded p-2 w-full" name="hourly_rate"
                value="<?php echo e(old('hourly_rate')); ?>" />

            <?php $__errorArgs = ['hourly_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="required_hours">
            <label for="required_hours" class="inline-block text-lg mb-2">Required hours</label>
            <input type="required_hours" class="border border-gray-200 rounded p-2 w-full"  name="required_hours"
                value="<?php echo e(old('required_hours')); ?>" />

            <?php $__errorArgs = ['required_hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="bank">
            <label for="bank" class="inline-block text-lg mb-2">Bank</label>
            <input type="bank" class="border border-gray-200 rounded p-2 w-full"  name="bank"
                value="<?php echo e(old('bank')); ?>" />

            <?php $__errorArgs = ['bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="bank_account_no">
            <label for="bank_account_no" class="inline-block text-lg mb-2">Bank account no.</label>
            <input type="bank_account_no" class="border border-gray-200 rounded p-2 w-full"  name="bank_account_no"
                value="<?php echo e(old('bank_account_no')); ?>" />

            <?php $__errorArgs = ['bank_account_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6" id="supervisor">
            <label for="supervisor" class="inline-block text-lg mb-2">Name of supervisor</label>
            <input type="supervisor" class="border border-gray-200 rounded p-2 w-full" name="supervisor"
                value="<?php echo e(old('supervisor')); ?>" />

            <?php $__errorArgs = ['supervisor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create New Employee
            </button>
        </div>
    </form>

    
    <script>
        const roleSelect = document.getElementById('role');
        const startDateInput = document.getElementById('start_date');
        const activeInput = document.getElementById('active');
        const hourlyRateInput = document.getElementById('hourly_rate');
        const requiredHoursInput = document.getElementById('required_hours');
        const bankInput = document.getElementById('bank');
        const bankAccountNoInput = document.getElementById('bank_account_no');
        const supervisorInput = document.getElementById('supervisor');
    
        roleSelect.addEventListener('change', () => {
          if (roleSelect.value === 'Admin') {
            startDateInput.classList.add('hidden');
            activeInput.classList.add('hidden');
            hourlyRateInput.classList.add('hidden');
            requiredHoursInput.classList.add('hidden');
            bankInput.classList.add('hidden');
            bankAccountNoInput.classList.add('hidden');
            supervisorInput.classList.add('hidden');
          } else {
            startDateInput.classList.remove('hidden');
            activeInput.classList.remove('hidden');
            hourlyRateInput.classList.remove('hidden');
            requiredHoursInput.classList.remove('hidden');
            bankInput.classList.remove('hidden');
            bankAccountNoInput.classList.remove('hidden');
            supervisorInput.classList.remove('hidden');
          }
        });
      </script>
    


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/admin/create_new_employee.blade.php ENDPATH**/ ?>