<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <head>
        <!-- Other head elements -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- Other head elements -->
    </head>
    <title>Payreto | intern List</title>
    <h1 class="font-bold text-gray-700 text-3xl">Users List</h1>


    <!-- Add User Modal toggle -->
    <div class="flex justify-end">
        <button data-modal-target="addUserModal" data-modal-toggle="addUserModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            type="button">
            <i class="fa-solid fa-user"></i> Add User
        </button>
    </div>

    <!-- Add Usedr Main modal -->
    <div id="addUserModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Add intern
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="addUserModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="/admin/create-new-employee/submit">
                    <div class="p-6 space-y-6">
                        <?php echo csrf_field(); ?>
                        <div class="mb-6">
                            <label for="role" class="inline-block text-lg mb-2">Role</label>
                            <select class="form-select border border-gray-200 rounded p-2 w-full" id="role"
                                name="role" required>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Intern">Intern</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="inline-block text-lg mb-2"> Full name </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" id="name"
                                name="name" value="<?php echo e(old('name')); ?>" />

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
                            <input type="username" class="border border-gray-200 rounded p-2 w-full" id="username"
                                name="username" value="<?php echo e(old('username')); ?>" />

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
                            <input type="email" class="border border-gray-200 rounded p-2 w-full" id="email"
                                name="email" value="<?php echo e(old('email')); ?>" />

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
                            <label for="sex" class="inline-block text-lg mb-2">Sex</label>
                            <select class="form-select border border-gray-200 rounded p-2 w-full" id="sex"
                                name="sex" required>
                                <option value="">Select Sex</option>
                                <option value="Admin">Male</option>
                                <option value="Intern">Female</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="inline-block text-lg mb-2">
                                Password
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                                value="" />

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
                            <input type="password" class="border border-gray-200 rounded p-2 w-full"
                                name="password_confirmation" value="" />

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
                            <label for="contact_number" class="inline-block text-lg mb-2">Contact number</label>
                            <input type="contact_number" class="border border-gray-200 rounded p-2 w-full"
                                id="contact_number" name="contact_number" value="<?php echo e(old('contact_number')); ?>" />

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
                            <label for="department" class="inline-block text-lg mb-2">Deparment</label>
                            <select class="form-select border border-gray-200 rounded p-2 w-full" id="department"
                                name="department" required>
                                <option value="">Select Department</option>
                                <option value="Technology">Technology</option>
                                <option value="People">People</option>
                                <option value="Operations">Operations</option>
                                <option value="Business Development">Business Development</option>
                            </select>
                        </div>

                        <div class="mb-6" id="start_date">
                            <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
                            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="start_date"
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
                                <?php echo e(old('active') ? 'checked' : ''); ?> value="1"
                                <?php if(old('active') == 1): ?> checked <?php endif; ?> />

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
                            <input type="hourly_rate" class="border border-gray-200 rounded p-2 w-full"
                                name="hourly_rate" value="<?php echo e(old('hourly_rate')); ?>" />

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
                            <input type="required_hours" class="border border-gray-200 rounded p-2 w-full"
                                name="required_hours" value="<?php echo e(old('required_hours')); ?>" />

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
                            <input type="bank" class="border border-gray-200 rounded p-2 w-full" name="bank"
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
                            <input type="bank_account_no" class="border border-gray-200 rounded p-2 w-full"
                                name="bank_account_no" value="<?php echo e(old('bank_account_no')); ?>" />

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
                            <input type="supervisor" class="border border-gray-200 rounded p-2 w-full"
                                name="supervisor" value="<?php echo e(old('supervisor')); ?>" />

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

                        
                        <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
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
                    </div>
                    <!-- Modal footer -->
                    <div class="flex justify-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Submit
                        </button>
                        <button data-modal-hide="addUserModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="mt-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
            <h2 class="font-semibold text-center mb-5">Interns List</h2>
            <table class="min-w-full divide-y divide-gray-200" id="internList" style="width:100%">
                <thead class="text-xs text-gray-50 uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Username
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Email
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Sex
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Contact number
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Position
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Start date
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Active
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hourly Rate</th>
                        <th scope="col" class="px-6 py-3">
                            Required Hours</th>
                        <th scope="col" class="px-6 py-3">
                            Department</th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Bank
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Bank Account No.
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500"
                            style="display: none;">
                            Supervisor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iterate over interns and populate table rows -->
                    <?php $__currentLoopData = $interns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->id); ?></td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <a href="/users/profile/<?php echo e($intern->id); ?>"><?php echo e($intern->name); ?></a>
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->username); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->email); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->sex); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->contact_number); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->position); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->start_date); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->active); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->role); ?></td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->hourly_rate); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->required_hours); ?></td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->department); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->bank); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->bank_account_no); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                                style="display: none;">
                                <?php echo e($intern->supervisor); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <!-- Modal toggle -->
                                <button data-modal-target="editinternModal" data-modal-toggle="editinternModal"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block editinternList"
                                    type="button">
                                    <i class="fa-solid fa-edit"></i>
                                </button>

                                <a href="/admin/employee-delete/<?php echo e($intern->id); ?>"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-full inline-block"
                                    onclick="event.preventDefault();
                                        if(confirm('Are you sure you want to delete this intern?')) {
                                            document.getElementById('delete-form-<?php echo e($intern->id); ?>').submit();
                                        }"><i
                                        class="fa-solid fa-trash"></i></a>
                                <form id="delete-form-<?php echo e($intern->id); ?>"
                                    action="/admin/employee-delete/<?php echo e($intern->id); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>

                                <!-- Main modal -->
                                <div id="success_message" class="hidden text-green-500 font-bold mb-4">Form submitted
                                    successfully!</div>
                                <div id="editinternModal" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Edit intern
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-hide="editinternModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form id="edit_form" class="p-6 space-y-6">
                                                <?php echo csrf_field(); ?>
                                                <div class="p-6 space-y-6">
                                                    <div class="mb-4" hidden>
                                                        <label for="id"
                                                            class="block text-gray-700 font-bold mb-2">ID:</label>
                                                        <input type="text" name="name" id="edit_id"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block text-gray-700 font-bold mb-2">Full
                                                            Name:</label>
                                                        <input type="text" name="name" id="edit_name"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block text-gray-700 font-bold mb-2">Username:</label>
                                                        <input type="text" name="name" id="edit_username"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="sex"
                                                            class="block text-gray-700 font-bold mb-2">Sex:</label>
                                                        <select id="edit_sex"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            name="sex" required>

                                                            <?php
                                                            $list = ['Male', 'Female'];
                                                            ?>
                                                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($sex); ?>"
                                                                    <?php echo e($sex == $intern->sex ? 'selected' : ''); ?>>
                                                                    <?php echo e($sex); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block text-gray-700 font-bold mb-2">Contact
                                                            Number:</label>
                                                        <input type="text" name="name" id="edit_contact_number"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block text-gray-700 font-bold mb-2">Position:</label>
                                                        <input type="text" name="name" id="edit_position"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="department"
                                                            class="block text-gray-700 font-bold mb-2">Department:</label>
                                                        <select id="edit_department"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            name="department" required>

                                                            <?php
                                                            $department_list = ['Technology', 'People', 'Business Development', 'Operations'];
                                                            ?>
                                                            <?php $__currentLoopData = $department_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($department); ?>"
                                                                    <?php echo e($department == $intern->department ? 'selected' : ''); ?>>
                                                                    <?php echo e($department); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="start_date"
                                                            class="block text-gray-700 font-bold mb-2">Start
                                                            Date:</label>
                                                        <input type="date" name="start_date" id="edit_start_date"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            value="<?php echo e($intern->start_date); ?>">
                                                    </div>
                                                    <div class="mb-4" id="active">
                                                        <label for="active"
                                                            class="block text-gray-700 font-bold mb-2">Active:</label>
                                                        <input type="checkbox" id="edit_active"
                                                            class="form-checkbox h-5 w-5 text-gray-600" name="active"
                                                            <?php echo e($intern->start_date ? 'checked' : ''); ?> value="1"
                                                            <?php if(old('active') == 1): ?> checked <?php endif; ?> />
                                                    </div>
                                                    <?php if($user_role === 'superadmin'): ?>
                                                        <div class="mb-4">
                                                            <label for="hourly_rate"
                                                                class="block text-gray-700 font-bold mb-2">Hourly
                                                                rate:</label>
                                                            <input type="number" name="hourly_rate"
                                                                id="edit_hourly_rate"
                                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                step="0.01">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="mb-4">
                                                        <label for="required_hours"
                                                            class="block text-gray-700 font-bold mb-2">Required
                                                            Hours:</label>
                                                        <input type="number" name="required_hours"
                                                            id="edit_required_hours"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="bank"
                                                            class="block text-gray-700 font-bold mb-2">Bank:</label>
                                                        <input type="text" name="bank" id="edit_bank"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="bank_account_no"
                                                            class="block text-gray-700 font-bold mb-2">Bank Account
                                                            No:</label>
                                                        <input type="number" name="bank_account_no"
                                                            id="edit_bank_account_no"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="supervisor"
                                                            class="block text-gray-700 font-bold mb-2">Name of
                                                            supervisor:</label>
                                                        <input type="text" name="supervisor" id="edit_supervisor"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            value="<?php echo e($intern->supervisor); ?>">
                                                    </div>

                                                    <div class="flex items-center justify-between">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
                                                            Changes</button>
                                                        <button data-modal-hide="editinternModal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                                                    </div>
                                            </form>
                                            <?php if($user_role === 'admin'): ?>
                                                <h1 class="text-2xl font-bold mb-4">Edit Employee Hourly Rate</h1>
                                                
                                                <form>
                                                    <?php echo csrf_field(); ?>
                                                    <div class="mb-4">
                                                        <label for="hourly_rate"
                                                            class="block text-gray-700 font-bold mb-2">Hourly
                                                            rate:</label>
                                                        <input type="number" name="hourly_rate"
                                                            id="edit_hourly_rate"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            step="0.01">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="reason"
                                                            class="block text-gray-700 font-bold mb-2">Reason:</label>
                                                        <input type="text" name="reason" id="reason"
                                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                            required value="">
                                                    </div>

                                                    <div class="flex items-center justify-between">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Request
                                                            change</button>
                                                    </div>
                                                </form>
                                            <?php endif; ?>
                                            <!-- Modal footer -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-10">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
            <h2 class="font-semibold text-center mb-5">Admin List</h2>
            <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
                <thead class="text-xs text-gray-50 uppercase bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iterate over admins and populate table rows -->
                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($admin->id); ?></td>
                            <td
                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700">
                                <a href="/users/profile/<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?></a>
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($admin->role); ?></td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <a href="/admin/employee-edit/<?php echo e($admin->id); ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block"><i
                                        class="fa-solid fa-edit"></i></a>

                                <?php if($user_role === 'superadmin'): ?>
                                    <a href="/admin/employee-delete/<?php echo e($admin->id); ?>"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this intern?')) {
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
        </div>
    </section>

    <!--SUPERADMINS SECTION (CANNOT EDIT OR DELETE OTHER SUPERADMINS. CAN ONLY EDIT SELF)-->
    <?php if($user_role === 'superadmin'): ?>
        <?php echo $__env->make('admin.superadmin-employee-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <script>
        //Edit Intern Modal
        $(document).on("click", ".editinternList", function() {
            $tr = $(this).closest('tr');

            var editinternData = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(editinternData);

            $('#edit_id').val(editinternData[0].trim());
            $('#edit_name').val(editinternData[1].trim());
            $('#edit_username').val(editinternData[2].trim());
            $('#edit_email').val(editinternData[3].trim());
            $('#edit_sex').val(editinternData[4].trim());
            $('#edit_contact_number').val(editinternData[5].trim());
            $('#edit_position').val(editinternData[6].trim());
            $('#edit_start_date').val(editinternData[7].trim());
            $('#edit_active').val(editinternData[8].trim());
            // $('#edit_role').val(editinternData[9].trim());
            $('#edit_hourly_rate').val(editinternData[10].trim());
            $('#edit_required_hours').val(editinternData[11].trim());
            $('#edit_department').val(editinternData[12].trim());
            $('#edit_bank').val(editinternData[13].trim());
            $('#edit_bank_account_no').val(editinternData[14].trim());
            $('#edit_supervisor').val(editinternData[15].trim());
        });

        //Form submission modal
        const form = document.getElementById('edit_form');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const successMessage = document.getElementById('success_message');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the form data
            const id = document.getElementById('edit_id').value;
            const name = document.getElementById('edit_name').value;
            const username = document.getElementById('edit_username').value;
            const email = document.getElementById('edit_email').value;
            const sex = document.getElementById('edit_sex').value;
            const contact_number = document.getElementById('edit_contact_number').value;
            const position = document.getElementById('edit_position').value;
            const start_date = document.getElementById('edit_start_date').value;
            const active = document.getElementById('edit_active').value;
            const hourly_rate = document.getElementById('edit_hourly_rate').value;
            const required_hours = document.getElementById('edit_required_hours').value;
            const department = document.getElementById('edit_department').value;
            const bank = document.getElementById('edit_bank').value;
            const bank_account_no = document.getElementById('edit_bank_account_no').value;
            const supervisor = document.getElementById('edit_supervisor').value;

            // Create an object with the form data
            const formData = {
                name: name,
                username: username,
                email: email,
                sex: sex,
                contact_number: contact_number,
                position: position,
                start_date: start_date,
                active: active,
                hourly_rate: hourly_rate,
                required_hours: required_hours,
                department: department,
                bank: bank,
                bank_account_no: bank_account_no,
                supervisor: supervisor
            };

            // Perform an AJAX request to submit the form data
            fetch(`/admin/employee-update/${id}`, {
                    method: 'POST',
                    body: JSON.stringify(formData),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                    }
                })
                .then(response => {
                    // Handle the response from the server
                    if (response.ok) {
                        // Form submission successful, show success message
                        // alert('Form submitted successfully!');
                        location.reload();
                    } else {
                        // Form submission failed, handle the error (e.g., show an error message)
                        alert('Form submission failed.');
                    }
                })
                .catch(error => {
                    // Handle any errors that occurred during the request
                    console.error(error);
                });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/admin/employee-list.blade.php ENDPATH**/ ?>