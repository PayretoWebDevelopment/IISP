<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d"
                    , }
                , }
            , }
        , };

    </script>

</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-12" src="<?php echo e(asset('images/logo.png')); ?>" alt="" class="logo" /></a>Intern Information System and Payroll
        <ul class="flex space-x-6 mr-6 text-lg">
            <?php if(auth()->guard()->check()): ?>
            <li>
                <span class="font-bold uppercase">
                    <?php echo e(auth()->user()->name); ?>

                </span>
            </li>
            <li>
                <span><a href="/"><img class="w-12" src="<?php echo e(asset('images/profile.png')); ?>" alt="" class="logo" /></a></span>

            </li>

            <?php endif; ?>
        </ul>
    </nav>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <?php if(auth()->user()->role == 'intern'): ?>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="flex-1 ml-3 whitespace-nowrap">Timesheets</span>
                        </a>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="/users/profile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">
                            <?php if(in_array(auth()->user()->role, ['superadmin', 'admin'])): ?>
                                Profiles
                            <?php else: ?>
                                My Profile
                            <?php endif; ?>
                        </span>
                    </a>
                </li>

                <?php if(in_array(auth()->user()->role, ['superadmin', 'admin'])): ?>
                <li>
                    <a href="/users/profile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Employee List</span>
                    </a>
                </li>
                <li>
                    <a href="/users/profile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Approvals<span>
                    </a>
                </li>
                <?php endif; ?>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        <?php echo csrf_field(); ?>
                        <button type="submit">
                            <i class="fa-solid fa-power-off"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div style="margin-left:25%">
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>

</body>

</html>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/components/layout.blade.php ENDPATH**/ ?>