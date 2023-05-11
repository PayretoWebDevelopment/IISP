<?php if(auth()->guard()->check()): ?>
<ul list-style-type: none;>
    <li>Full name: <?php echo e(auth()->user()->name); ?></li>
    <li>Contact number: <?php echo e(auth()->user()->contact_number); ?></li>
    <li>Email address: <?php echo e(auth()->user()->email); ?></li>
    <li>Position: <?php echo e(auth()->user()->position); ?></li>
    <li>Role: <?php echo e(auth()->user()->role); ?></li>
    <li>Start date: <?php echo e(auth()->user()->start_date); ?></li>
    <li>Active: <?php if(auth()->user()->active == true): ?>
        Yes
        <?php else: ?>
        No
        <?php endif; ?></li>
    <li>Hourly rate: <?php echo e(auth()->user()->hourly_rate); ?></li>
    <li>Required hours: <?php echo e(auth()->user()->required_hours); ?></li>
    <li>Payment method: <?php echo e(auth()->user()->payment_method); ?></li>
    <li>Hourly rate last updated:: <?php echo e(auth()->user()->hourly_rate_last_updated); ?></li>
    <li>Supervisor: <?php echo e(auth()->user()->supervisor); ?></li>
    <li>Bank account no: <?php echo e(auth()->user()->bank_account_no); ?></li>
</ul>
<?php endif; ?>
<main>
    
    <a href="<?php echo e(url('/users/change-password')); ?>" class="btn btn-primary" id="startTimerButton">Change password</a>
    <?php echo e($slot); ?>

</main>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/components/profile.blade.php ENDPATH**/ ?>