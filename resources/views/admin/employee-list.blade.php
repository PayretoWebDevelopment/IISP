<x-layout>
    <title>Payreto | Employee List</title>
    <h1 class="text-2xl font-bold mb-4">Employee List</h1>
    <a href="/admin/create-new-employee"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Add Employee</a>
    <h2 class="font-bold mb-4">Interns</h2>
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Role</th>
                <th class="py-2 px-4 border">Hourly Rate</th>
                <th class="py-2 px-4 border">Required Hours</th>
                <th class="py-2 px-4 border">Department</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate over employees and populate table rows -->
            @foreach ($interns as $intern)
                <tr>
                    <td class="py-2 px-4 border">{{ $intern->id }}</td>
                    <td class="py-2 px-4 border hover:bg-blue-700"><a
                            href="/users/profile/{{ $intern->id }}">{{ $intern->name }}</a></td>
                    <td class="py-2 px-4 border">{{ $intern->role }}</td>
                    <td class="py-2 px-4 border">{{ $intern->hourly_rate }}</td>
                    <td class="py-2 px-4 border">{{ $intern->required_hours }}</td>
                    <td class="py-2 px-4 border">{{ $intern->department }}</td>
                    <td class="py-2 px-4 border">
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
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Role</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate over employees and populate table rows -->
            @foreach ($admins as $admin)
                <tr>
                    <td class="py-2 px-4 border">{{ $admin->id }}</td>
                    <td class="py-2 px-4 border hover:bg-blue-700"><a
                            href="/users/profile/{{ $admin->id }}">{{ $admin->name }}</a></td>
                    <td class="py-2 px-4 border">{{ $admin->role }}</td>
                    <td class="py-2 px-4 border">
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
</x-layout>
