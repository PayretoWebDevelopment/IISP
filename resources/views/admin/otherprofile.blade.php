<x-layout module_name="My Profile">
    <title>Payreto | My Profile</title>
    <x-card class="p-10">
        <x-otherprofile>
            @auth
                <ul class="list-none">
                    <li>Full name: {{ $user->name }}</li>
                    <li>Contact number: {{ $user->contact_number }}</li>
                    <li>Department: {{ $user->department }}</li>
                    <li>Email address: {{ $user->email }}</li>
                    <li>Sex: {{ $user->sex }}</li>
                    <li>Position: {{ $user->position }}</li>
                    <li>Role: {{ $user->role }}</li>
                    @if (!$user->isAdmin())
                        <li>Start date: {{ $user->start_date }}</li>
                        <li>Active: <span class="@if ($user->active == true) text-green-500 @else text-red-500 @endif">
                                @if ($user->active == true)
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        </li>
                        <li>Hourly rate: {{ $user->hourly_rate }}</li>
                        <li>Required hours: {{ $user->required_hours }}</li>
                        <li>Bank: {{ $user->bank }}</li>
                        <li>Hourly rate last updated: {{ $user->hourly_rate_last_updated }}</li>
                        <li>Supervisor: {{ $user->supervisor }}</li>
                        <li>Bank account no: {{ $user->bank_account_no }}</li>
                    @endif
                </ul>
                <br>
            @endauth
        </x-otherprofile>
    </x-card>
</x-layout>