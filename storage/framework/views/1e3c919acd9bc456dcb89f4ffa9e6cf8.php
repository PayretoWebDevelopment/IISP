<title>Payreto | Login</title>

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
    <p class="mb-4">Log into your account</p>
</header>

<form method="POST" action="/users/authenticate">
    <?php echo csrf_field(); ?>

    <div class="mb-6">
        <label for="username" class="inline-block text-lg mb-2">Username</label>
        <input type="username" class="border border-gray-200 rounded p-2 w-full" name="username" value="<?php echo e(old('username')); ?>" />

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
        <label for="password" class="inline-block text-lg mb-2">
            Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="<?php echo e(old('password')); ?>" />

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
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Sign In
        </button>
    </div>

    <div class="mt-8">
        <p>
            Forgot your password?
            <a href="/">Notify Us</a>
        </p>
    </div>
</form>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/users/login.blade.php ENDPATH**/ ?>