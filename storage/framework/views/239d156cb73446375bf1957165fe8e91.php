<?php if(auth()->guard()->check()): ?>
    <li>
        <span class="font-bold uppercase">
            Welcome <?php echo e(auth()->user()->name); ?>

        </span>
    </li>
<?php endif; ?>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/dashboard.blade.php ENDPATH**/ ?>