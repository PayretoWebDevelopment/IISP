<?php if(session()->has('message')): ?>
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 2500)" 
        class=""
        x-show="show">
    <!-- class fixed top-0 transform -translate-x-1/2 bg-laravel text-white px-48 py-3 left-1/2-->
        <p><?php echo e(session('message')); ?></p>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\IISP\resources\views/components/flash-message.blade.php ENDPATH**/ ?>