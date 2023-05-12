<x-layout module_name="My Profile">
    <title>Payreto | My Profile</title>
    <x-card class="p-10">
        <x-profile>
            @auth
                <ul class="list-none">
                    <li>Full name: {{ auth()->user()->name }}</li>
                    <li>Contact number: {{ auth()->user()->contact_number }}</li>
                    <li>Department: {{ auth()->user()->department }}</li>
                    <li>Email address: {{ auth()->user()->email }}</li>
                    <li>Position: {{ auth()->user()->position }}</li>
                    <li>Role: {{ auth()->user()->role }}</li>
                    <li>Start date: {{ auth()->user()->start_date }}</li>
                    <li>Active: <span class="@if (auth()->user()->active == true) text-green-500 @else text-red-500 @endif">
                            @if (auth()->user()->active == true)
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </li>
                    <li>Hourly rate: {{ auth()->user()->hourly_rate }}</li>
                    <li>Required hours: {{ auth()->user()->required_hours }}</li>
                    <li>Bank: {{ auth()->user()->bank }}</li>
                    <li>Hourly rate last updated: {{ auth()->user()->hourly_rate_last_updated }}</li>
                    <li>Supervisor: {{ auth()->user()->supervisor }}</li>
                    <li>Bank account no: {{ auth()->user()->bank_account_no }}</li>
                </ul>
            @endauth
            <a href="{{ url('/users/profile/create-edit-request') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                id="startTimerButton">Create Edit Request</a>
        </x-profile>
    </x-card>
</x-layout>
