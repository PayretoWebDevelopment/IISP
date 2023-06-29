<title>Payreto IISP | Login</title>

<head>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
</head>

<body>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(https://www.payreto.com/wp-content/uploads/2021/03/Homepage-1.png)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-60">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">IISP</h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            
                            <?php echo e($landing_description); ?>

                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-15 sm:h-14" src="<?php echo e(asset('images/logo.png')); ?>" alt="PayretoLogo">
                        </div>

                        <p class="mt-3 text-gray-500">Sign in to access your account</p>
                    </div>

                    <div class="mt-8">
                        <form method="POST" action="/users/authenticate">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm text-gray-600">Username</label>
                                <input type="username" name="username" id="username" placeholder="Your Username"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg  focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
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

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password"
                                        class="text-sm text-gray-600">Password</label>
                                    
                                </div>

                                <input type="password" name="password" id="password" placeholder="Your Password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg  focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                    value="<?php echo e(old('password')); ?>" />

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

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>
                            <p class="mt-3 text-gray-500">Forgot your password? <a href="/users/forgot" class="underline">Reset your password.</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/users/login.blade.php ENDPATH**/ ?>