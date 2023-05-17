<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'My Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'My Profile']); ?>
    <title>Payreto | My Profile</title>
    <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-10']); ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.profile','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if(auth()->guard()->check()): ?>
                <ul class="list-none">
                    <li>Full name: <?php echo e(auth()->user()->name); ?></li>
                    <li>Contact number: <?php echo e(auth()->user()->contact_number); ?></li>
                    <li>Department: <?php echo e(auth()->user()->department); ?></li>
                    <li>Email address: <?php echo e(auth()->user()->email); ?></li>
                    <li>Position: <?php echo e(auth()->user()->position); ?></li>
                    <li>Role: <?php echo e(auth()->user()->role); ?></li>
                    <li>Start date: <?php echo e(auth()->user()->start_date); ?></li>
                    <li>Active: <span class="<?php if(auth()->user()->active == true): ?> text-green-500 <?php else: ?> text-red-500 <?php endif; ?>">
                            <?php if(auth()->user()->active == true): ?>
                                Yes
                            <?php else: ?>
                                No
                            <?php endif; ?>
                        </span>
                    </li>
                    <li>Hourly rate: <?php echo e(auth()->user()->hourly_rate); ?></li>
                    <li>Required hours: <?php echo e(auth()->user()->required_hours); ?></li>
                    <li>Bank: <?php echo e(auth()->user()->bank); ?></li>
                    <li>Hourly rate last updated: <?php echo e(auth()->user()->hourly_rate_last_updated); ?></li>
                    <li>Supervisor: <?php echo e(auth()->user()->supervisor); ?></li>
                    <li>Bank account no: <?php echo e(auth()->user()->bank_account_no); ?></li>
                </ul>
            <?php endif; ?>
            <br>
            <a href="<?php echo e(url('/users/profile/create-edit-request')); ?>"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                id="startTimerButton">Create Edit Request</a>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\User\Downloads\IISP\resources\views/intern/profile.blade.php ENDPATH**/ ?>