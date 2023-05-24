<x-layout>
    <title>Payreto | Employee List</title>
    <h1 class="text-2xl font-bold mb-4">Employee List</h1>
    <a href="/admin/create-new-employee"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Add Employee</a>
    <h2 class="font-bold mb-4">Interns</h2>
    <table class="min-w-full divide-y divide-gray-200" id="internList" style="width:100%">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Name
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Role
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Hourly Rate</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Required Hours</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Department</th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Iterate over employees and populate table rows -->
            @foreach ($interns as $intern)
                <tr>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $intern->id }}</td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                            href="/users/profile/{{ $intern->id }}">{{ $intern->name }}</a></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $intern->role }}</td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $intern->hourly_rate }}
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        {{ $intern->required_hours }}</td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $intern->department }}
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <a href="/admin/employee-edit/{{ $intern->id }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                        <a href="/admin/employee-delete/{{ $intern->id }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                            onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this employee?')) {
                                        document.getElementById('delete-form-{{ $intern->id }}').submit();
                                    }">Delete</a>
                        <form id="delete-form-{{ $intern->id }}" action="/admin/employee-delete/{{ $intern->id }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="font-bold mb-4">Admins</h2>
    <table class="min-w-full divide-y divide-gray-200" id="adminList" style="width:100%">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">ID
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Name
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Role
                </th>
                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Iterate over employees and populate table rows -->
            @foreach ($admins as $admin)
                <tr>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $admin->id }}</td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                            href="/users/profile/{{ $admin->id }}">{{ $admin->name }}</a></td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $admin->role }}</td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <a href="/admin/employee-edit/{{ $admin->id }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
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

    <!--SUPERADMINS SECTION (CANNOT EDIT OR DELETE OTHER SUPERADMINS. CAN ONLY EDIT SELF)-->
    @if ($user_role === 'superadmin')
        @include('admin.superadmin-employee-list')
    @endif
</x-layout>
