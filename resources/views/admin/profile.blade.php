<x-layout module_name="My Profile">
    <title>Payreto | My Profile</title>
    <x-card class="p-10">
        <x-profile>

            @auth
                <ul list-style-type: none;>
                    <li>Full name: {{ auth()->user()->name }}</li>
                    <li>Contact number: {{ auth()->user()->contact_number }}</li>
                    <li>Department: {{ auth()->user()->department }}</li>
                    <li>Email address: {{ auth()->user()->email }}</li>
                    <li>Position: {{ auth()->user()->position }}</li>
                    <li>Role: {{ auth()->user()->role }}</li>
                </ul>
            @endauth
            <br>
        </x-profile>
    </x-card>
</x-layout>
