<h2 class="font-bold mb-4">Superadmins</h2>
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
                <!-- Iterate over superadmins and populate table rows -->
                @foreach ($superadmins as $superadmin)
                    <tr>
                        <td class="py-2 px-4 border">{{ $superadmin->id }}</td>
                        <td class="py-2 px-4 border hover:bg-blue-700"><a
                                href="/users/profile/{{ $superadmin->id }}">{{ $superadmin->name }}</a></td>
                        <td class="py-2 px-4 border">{{ $superadmin->role }}</td>
                        <td class="py-2 px-4 border">
                            @if (auth()->user()->id == $superadmin->id)
                            <a href="/admin/employee-edit/{{ $superadmin->id }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>