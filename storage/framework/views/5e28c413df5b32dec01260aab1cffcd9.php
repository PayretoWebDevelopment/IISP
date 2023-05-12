<form action="/users/profile/upload-profile-picture" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="profile-picture-container">
        <label for="profile_picture">
            <img id="profile_picture_preview" style="width: 100px;" src="<?php echo e(auth()->user()->profile_picture ? asset('storage/profile_pictures/'.auth()->user()->profile_picture) : asset('images/default-profile-picture.png')); ?>" alt="Profile Picture">
        </label>
        <input type="file" name="profile_picture" id="profile_picture" hidden>
    </div>
    <input type="hidden" name="user_id" value="<?php echo e(isset($user) ? $user->id : ''); ?>">
    <button type="submit" class="btn btn-primary">Save Profile Picture</button>
</form>

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
<?php /**PATH /home/cabox/workspace/iisp/resources/views/components/profile.blade.php ENDPATH**/ ?>