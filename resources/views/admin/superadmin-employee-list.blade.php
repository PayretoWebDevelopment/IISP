<section class="mt-10">
    <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
        <h2 class="font-semibold text-center mb-5">Superadmin List</h2>
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
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Iterate over superadmins and populate table rows -->
                @foreach ($superadmins as $superadmin)
                    <tr>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $superadmin->id }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"hover:bg-blue-700"><a
                                href="/users/profile/{{ $superadmin->id }}">{{ $superadmin->name }}</a></td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $superadmin->role }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                            @if (auth()->user()->id == $superadmin->id)
                            <a href="/admin/employee-edit/{{ $superadmin->id }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>