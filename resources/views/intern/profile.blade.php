<x-layout module_name="My Profile">
    <h1 class="font-bold text-gray-700 text-3xl">Intern Profile</h1>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-3 hover:shadow h-96">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                    </div>
                    <div>
                        <x-profile>
                        </x-profile>
                        <div class="bg-white p-3">
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ auth()->user()->name }}</h1>
                            <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ auth()->user()->position }}
                            </h3>
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>{{ auth()->user()->role }}</span>
                                    <span class="ml-auto"><span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>{{ auth()->user()->email }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End of profile card -->
                <a href="{{ url('/users/profile/create-edit-request') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                id="startTimerButton">Create Edit Request</a>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm h-96">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700 mt-10">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Full Name</div>
                                <div class="px-4 py-2">{{ auth()->user()->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ auth()->user()->contact_number }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Bank Type</div>
                                <div class="px-4 py-2">{{ auth()->user()->bank }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Bank Account #</div>
                                <div class="px-4 py-2">{{ auth()->user()->bank_account_no }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800">{{ auth()->user()->email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Department</div>
                                <div class="px-4 py-2">{{ auth()->user()->department }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->
            </div>
        </div>
        <div class="bg-white p-3 shadow-sm rounded-sm my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="font-bold">{{ __('Change Password') }}</div>
                    <div>
                        <form method="POST" action="/users/process-change-password">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Current Password</label>
                                <input id="current_password" type="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  @error('current_password') is-invalid @enderror"
                                    name="current_password" required autocomplete="current-password">


                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('New Password') }}</label>
                                <input id="password" type="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('Confirm New Password') }}</label>
                                <input id="password_confirmation" type="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <title>Payreto | My Profile</title>
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
            <br>
            <a href="{{ url('/users/profile/create-edit-request') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200"
                id="startTimerButton">Create Edit Request</a>
        </x-profile>
    </x-card> --}}
</x-layout>
