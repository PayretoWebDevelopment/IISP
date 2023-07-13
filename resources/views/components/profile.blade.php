<form action="/users/profile/upload-profile-picture" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container flex justify-around items-center">
        <label for="profile_picture" class="cursor-pointer">
            <div class="relative">
                <img id="profile_picture_preview" class="w-28 rounded-full object-cover"
                    src="{{ auth()->user()->profile_picture ? asset('profile_pictures/' . auth()->user()->profile_picture) : asset('images/default-profile-picture.png') }}"
                    alt="Profile Picture">
                <div
                    class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-0 hover:opacity-100">
                    <span class="text-white text-center text-sm font-bold">Upload Image</span>
                </div>
            </div>
        </label>
        <input type="file" name="profile_picture" id="profile_picture" hidden>
        <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
        <button type="submit"
            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Save
        </button>
    </div>
</form>
<div class="mt-5 text-center">
    {{ $slot }}
</div>

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
