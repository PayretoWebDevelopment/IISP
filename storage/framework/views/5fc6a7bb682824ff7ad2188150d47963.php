<form action="/users/profile/upload-profile-picture" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="flex flex-col items-center">
        <label for="profile_picture" class="cursor-pointer">
            <div class="relative">
                <img id="profile_picture_preview" class="w-32 rounded-full object-cover"
                    src="<?php echo e(auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('images/default-profile-picture.png')); ?>"
                    alt="Profile Picture">
                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-0 hover:opacity-100">
                    <span class="text-white text-lg font-bold">Upload Profile Picture</span>
                </div>
            </div>
        </label>
        <input type="file" name="profile_picture" id="profile_picture" hidden>
        <input type="hidden" name="user_id" value="<?php echo e(isset($user) ? $user->id : ''); ?>">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded">
            Save Profile Picture
        </button>
    </div>


</form>
<main class="mt-8">
    <?php echo e($slot); ?>

    
    <a href="<?php echo e(url('/users/contact-user')); ?>"
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
<?php /**PATH C:\Users\user\Downloads\IISP\resources\views/components/otherprofile.blade.php ENDPATH**/ ?>