<form action="/users/profile/upload-profile-picture" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="profile-picture-container">
        <label for="profile_picture">
            <img id="profile_picture_preview" style="width: 100px;" src="{{ auth()->user()->profile_picture ? asset('storage/profile_pictures/'.auth()->user()->profile_picture) : asset('images/default-profile-picture.png') }}" alt="Profile Picture">
        </label>
        <input type="file" name="profile_picture" id="profile_picture" hidden>
    </div>
    <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
    <button type="submit" class="btn btn-primary">Save Profile Picture</button>
</form>

<main>
    {{$slot}}
    {{-- button to change password --}}
    <a href="{{ url('/users/change-password') }}" class="btn btn-primary" id="startTimerButton">Change password</a>
</main>

{{-- upload profile picture script --}}
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
