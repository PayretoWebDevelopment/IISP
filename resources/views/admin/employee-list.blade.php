<x-layout>
    <title>Payreto | Employee List</title>
    <h1 class="font-bold text-gray-700">Users List</h1>


    <!-- Add User Modal toggle -->
    <div class="flex justify-end">
        <button data-modal-target="addUserModal" data-modal-toggle="addUserModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            type="button">
            <i class="fa-solid fa-user"></i> Add User
        </button>
    </div>

    <!-- Add Usedr Main modal -->
    <div id="addUserModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Add Employee
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="addUserModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="/admin/create-new-employee/submit">
                    <div class="p-6 space-y-6">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="inline-block text-lg mb-2"> Full name </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" id="name"
                                name="name" value="{{ old('name') }}" />

                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="username" class="inline-block text-lg mb-2">Username</label>
                            <input type="username" class="border border-gray-200 rounded p-2 w-full" id="username"
                                name="username" value="{{ old('username') }}" />

                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2">Email</label>
                            <input type="email" class="border border-gray-200 rounded p-2 w-full" id="email"
                                name="email" value="{{ old('email') }}" />

                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password" class="inline-block text-lg mb-2">
                                Password
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                                value="" />

                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password2" class="inline-block text-lg mb-2">
                                Confirm Password
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full"
                                name="password_confirmation" value="" />

                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="role" class="inline-block text-lg mb-2">Role</label>
                            <select class="form-select border border-gray-200 rounded p-2 w-full" id="role"
                                name="role" required>
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Intern">Intern</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="contact_number" class="inline-block text-lg mb-2">Contact number</label>
                            <input type="contact_number" class="border border-gray-200 rounded p-2 w-full"
                                id="contact_number" name="contact_number" value="{{ old('contact_number') }}" />

                            @error('contact_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="position" class="inline-block text-lg mb-2">Position</label>
                            <input type="position" class="border border-gray-200 rounded p-2 w-full" name="position"
                                value="{{ old('position') }}" />

                            @error('position')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="department" class="inline-block text-lg mb-2">Department</label>
                            <input type="department" class="border border-gray-200 rounded p-2 w-full"
                                name="department" value="{{ old('department') }}" />

                            @error('department')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="start_date">
                            <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
                            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="start_date"
                                value=""{{ old('start_date') }} />

                            @error('start_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="active">
                            <label for="active" class="inline-block text-lg mb-2">Active</label>
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="active"
                                {{ old('active') ? 'checked' : '' }} value="1"
                                @if (old('active') == 1) checked @endif />

                            @error('active')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6" id="hourly_rate">
                            <label for="hourly_rate" class="inline-block text-lg mb-2">Hourly rate</label>
                            <input type="hourly_rate" class="border border-gray-200 rounded p-2 w-full"
                                name="hourly_rate" value="{{ old('hourly_rate') }}" />

                            @error('hourly_rate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="required_hours">
                            <label for="required_hours" class="inline-block text-lg mb-2">Required hours</label>
                            <input type="required_hours" class="border border-gray-200 rounded p-2 w-full"
                                name="required_hours" value="{{ old('required_hours') }}" />

                            @error('required_hours')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="bank">
                            <label for="bank" class="inline-block text-lg mb-2">Bank</label>
                            <input type="bank" class="border border-gray-200 rounded p-2 w-full" name="bank"
                                value="{{ old('bank') }}" />

                            @error('bank')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="bank_account_no">
                            <label for="bank_account_no" class="inline-block text-lg mb-2">Bank account no.</label>
                            <input type="bank_account_no" class="border border-gray-200 rounded p-2 w-full"
                                name="bank_account_no" value="{{ old('bank_account_no') }}" />

                            @error('bank_account_no')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="supervisor">
                            <label for="supervisor" class="inline-block text-lg mb-2">Name of supervisor</label>
                            <input type="supervisor" class="border border-gray-200 rounded p-2 w-full"
                                name="supervisor" value="{{ old('supervisor') }}" />

                            @error('supervisor')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- script for hiding fields when admin role is selected --}}
                        <script src="{{ asset('js/scripts.js') }}"></script>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex justify-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Submit
                        </button>
                        <button data-modal-hide="addUserModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="mt-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
            <h2 class="font-semibold text-center mb-5">Interns List</h2>
            <table class="min-w-full divide-y divide-gray-200" id="internList" style="width:100%">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Name
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Role
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Hourly Rate</th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Required Hours</th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Department</th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iterate over employees and populate table rows -->
                    @foreach ($interns as $intern)
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $intern->id }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <a href="/users/profile/{{ $intern->id }}">{{ $intern->name }}</a>
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $intern->role }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $intern->hourly_rate }}
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $intern->required_hours }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $intern->department }}
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{-- <a href="/admin/employee-edit/{{ $intern->id }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block"><i
                                        class="fa-solid fa-edit"></i></a> --}}
                                <!-- Modal toggle -->
                                <button data-modal-target="editEmployeeModal" data-modal-toggle="editEmployeeModal"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block editEmployeeList"
                                    type="button">
                                    Edit
                                </button>

                                <!-- Main modal -->
                                <div id="editEmployeeModal" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Edit Employee
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-hide="editEmployeeModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 font-bold mb-2">Full Name:</label>
                                                    <input type="text" name="name" id="edit_name"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 font-bold mb-2">Username:</label>
                                                    <input type="text" name="name" id="edit_username"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 font-bold mb-2">Email:</label>
                                                    <input type="text" name="name" id="edit_email"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 font-bold mb-2">Contact
                                                        Number:</label>
                                                    <input type="text" name="name" id="edit_contact"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="block text-gray-700 font-bold mb-2">Position:</label>
                                                    <input type="text" name="name" id="edit_position"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="department"
                                                        class="block text-gray-700 font-bold mb-2">Department:</label>
                                                    <select
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="department" required>
                                                        @foreach ($department_list as $department)
                                                            <option value="{{ $department }}"
                                                                {{ $department == $employee->department ? 'selected' : '' }}>
                                                                {{ $department }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="start_date"
                                                        class="block text-gray-700 font-bold mb-2">Start Date:</label>
                                                    <input type="date" name="start_date" id="start_date"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                        value="{{ $employee->start_date }}">
                                                </div>
                                                <div class="mb-4" id="active">
                                                    <label for="active"
                                                        class="block text-gray-700 font-bold mb-2">Active:</label>
                                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600"
                                                        name="active" {{ $employee->start_date ? 'checked' : '' }}
                                                        value="1"
                                                        @if (old('active') == 1) checked @endif />
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex justify-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                                <button data-modal-hide="editEmployeeModal" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                                                <button data-modal-hide="editEmployeeModal" type="button"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I
                                                    Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="/admin/employee-delete/{{ $intern->id }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-full inline-block"
                                    onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this employee?')) {
                                                document.getElementById('delete-form-{{ $intern->id }}').submit();
                                            }"><i
                                        class="fa-solid fa-trash"></i></a>
                                <form id="delete-form-{{ $intern->id }}"
                                    action="/admin/employee-delete/{{ $intern->id }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="mt-10">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
            <h2 class="font-semibold text-center mb-5">Employee List</h2>
            <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Name
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Role
                        </th>
                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iterate over employees and populate table rows -->
                    @foreach ($admins as $admin)
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $admin->id }}</td>
                            <td
                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700">
                                <a href="/users/profile/{{ $admin->id }}">{{ $admin->name }}</a>
                            </td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                {{ $admin->role }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                <a href="/admin/employee-edit/{{ $admin->id }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block"><i
                                        class="fa-solid fa-edit"></i></a>

                                @if ($user_role === 'superadmin')
                                    <a href="/admin/employee-delete/{{ $admin->id }}"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                                        onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this employee?')) {
                                                document.getElementById('delete-form-{{ $admin->id }}').submit();
                                            }">Delete</a>
                                    <form id="delete-form-{{ $admin->id }}"
                                        action="/admin/employee-delete/{{ $admin->id }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!--SUPERADMINS SECTION (CANNOT EDIT OR DELETE OTHER SUPERADMINS. CAN ONLY EDIT SELF)-->
    @if ($user_role === 'superadmin')
        @include('admin.superadmin-employee-list')
    @endif
    <script>
        $(document).on("click", ".editEmployeeList", function() {
            $tr = $(this).closest('tr');

            var editEmployeeData = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(editEmployeeData);

            $('#edit_name').val(editEmployeeData[1].trim());
            $('#edit_username').val(editEmployeeData[2].trim());
            $('#edit_email').val(editEmployeeData[3].trim());
            $('#edit_contact_number').val(editEmployeeData[4].trim());
            $('#edit_department').val(editEmployeeData[5].trim());
            // $('#edit_username').val(editEmployeeData[5]);
        });
    </script>
</x-layout>
