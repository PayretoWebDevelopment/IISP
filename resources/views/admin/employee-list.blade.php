<x-layout>
    <h1 class="text-2xl font-bold mb-4">Employee List</h1>
    <a href="/admin/create-new-employee"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-4">Add Employee</a>
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
            @foreach ($employees as $employee)
                <tr>
                    <td class="py-2 px-4 border">{{ $employee->id }}</td>
                    <td class="py-2 px-4 border hover:bg-blue-700"><a href="/users/profile/{{ $employee->id }}">{{ $employee->name }}</a></td>
                    <td class="py-2 px-4 border">{{ $employee->role }}</td>
                    <td class="py-2 px-4 border">{{ $employee->hourly_rate }}</td>
                    <td class="py-2 px-4 border">{{ $employee->required_hours }}</td>
                    <td class="py-2 px-4 border">{{ $employee->department }}</td>
                    <td class="py-2 px-4 border">
                        <a href="/admin/employee-edit/{{ $employee->id }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                        <a href="/admin/employee-delete/{{ $employee->id }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block"
                            onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to delete this employee?')) {
                                        document.getElementById('delete-form-{{ $employee->id }}').submit();
                                    }">Delete</a>
                        <form id="delete-form-{{ $employee->id }}"
                            action="/admin/employee-delete/{{ $employee->id }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>