<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['user']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['user']); ?>
<?php foreach (array_filter((['user']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<form action="/users/profile/upload-profile-picture" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="flex flex-col items-center">
        <label for="profile_picture" class="">
            <div class="relative">
                <img id="profile_picture_preview" class="w-32 rounded-full object-cover"
                    src="<?php echo e(auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('images/default-profile-picture.png')); ?>"
                    alt="Profile Picture">
                
            </div>
        </label>
        
    </div>


</form>
<main class="mt-8">
    <?php echo e($slot); ?>

    
    <!-- { { url('/admin/contact-user/'. $user->id) }} -->
    <!-- mailto:{ {$user->email}}?subject=Write%20your%20subject%20here.&body=Write%20your%20body%20here. -->
    <a href="<?php echo e(url('/admin/contact-user/'. $user->id)); ?>"
        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Contact User</a>
</main>



<script>
    // Get the input element
    const inputElement = document.getElementById("profile_picture");

    // Add a listener for when a file is selected
    inputElement.addEventListener("change", function(event) {
        // Get the preview image element
        const previewElement = document.getElementById("profile_picture_preview");

        // Get the selected file
        const file = event.target.files[0];

        // Create a URL for the selected file
        const url = URL.createObjectURL(file);

        // Set the preview image source to the URL
        previewElement.src = url;
    });
</script>
<?php /**PATH C:\xampp\htdocs\IISP\resources\views/components/otherprofile.blade.php ENDPATH**/ ?>