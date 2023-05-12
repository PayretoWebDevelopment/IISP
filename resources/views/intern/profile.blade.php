<x-layout module_name="My Profile">
    <title>Payreto | My Profile</title>
    <x-card class="p-10">
        <x-profile>
             <a href="{{ url('/users/profile/create-edit-request') }}" class="btn btn-primary" id="startTimerButton">Create Edit Request</a>
        </x-profile>
    </x-card>
</x-layout>
