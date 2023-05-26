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
    <h1 class="font-bold text-gray-700">Users List</h1>


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
                        Add Employee
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
                            <label for="role" class="inline-block text-lg mb-2">Role</label>
                            <select class="form-select border border-gray-200 rounded p-2 w-full" id="role"
                                name="role" required>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Intern">Intern</option>
                            </select>
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
                            <label for="department" class="inline-block text-lg mb-2">Department</label>
                            <input type="department" class="border border-gray-200 rounded p-2 w-full"
                                name="department" value="<?php echo e(old('department')); ?>" />

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

                        <div class="mb-6" id="start_date">
                            <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
                            <input type="start_date" class="border border-gray-200 rounded p-2 w-full"
                                name="start_date" value=""<?php echo e(old('start_date')); ?> />

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
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                        </th>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Name
                        </th>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Role
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
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->hourly_rate); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->required_hours); ?></td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <?php echo e($intern->department); ?>

                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <a href="/admin/employee-edit/<?php echo e($intern->id); ?>"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block"><i class="fa-solid fa-edit"></i></a>

                                <a href="/admin/employee-delete/<?php echo e($intern->id); ?>"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-full inline-block"
                                    onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this employee?')) {
                                                document.getElementById('delete-form-<?php echo e($intern->id); ?>').submit();
                                            }"><i class="fa-solid fa-trash"></i></a>
                                <form id="delete-form-<?php echo e($intern->id); ?>"
                                    action="/admin/employee-delete/<?php echo e($intern->id); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-10">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
            <h2 class="font-semibold text-center mb-5">Employee List</h2>
            <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                        </th>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Name
                        </th>
                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Role
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
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block"><i class="fa-solid fa-edit"></i></a>

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
        </div>
    </section>
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