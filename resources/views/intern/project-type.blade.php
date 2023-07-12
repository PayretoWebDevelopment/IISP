<x-layout module_name="Project types">

    <head>
        <title>Payreto | Project Type</title>
    </head>

    <body>
        <h1 class="font-bold text-gray-700 text-3xl">Project Types</h1>
        <!-- Modal toggle -->
        <div class="flex justify-end my-5">
            <button data-modal-target="projectTypeModal" data-modal-toggle="projectTypeModal"
                class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
                Add Project Type
            </button>
        </div>
        <!-- Main modal -->
        <div id="projectTypeModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <form method="post" action="/project-types">
                    @csrf
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Project Types
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                data-modal-hide="projectTypeModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">

                            <div id="choices-container">
                                <div>
                                    <div>
                                        <label for="department"
                                            class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                                        <input type="text" name="department" placeholder="Department" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required>
                                    </div>
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                        <input type="text" name="name" placeholder="Name" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                            <button data-modal-hide="projectTypeModal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Decline
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Submit
                            </button>
                        </div>
                </form>
            </div>
        </div>
        </div>

        <div class="overflow-x-auto">
            <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
                <table class="min-w-full divide-y divide-gray-200" id="reportList" style="width:100%">
                    @if ($user->isAdmin())
                        <thead class="text-xs text-gray-50 uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">Department</th>
                                <th scope="col" class="px-6 py-3">Project Name</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @foreach ($choices as $choice)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4"> {{ $choice->department }}</td>
                                <td class="px-6 py-4"> {{ $choice->name }}</td>
                                @if ($user->isAdmin())
                                    <td class="px-6 py-4">
                                        <button data-modal-target="editProjectModal"
                                            data-modal-toggle="editProjectModal"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full inline-block editProjectList"
                                            type="button">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <form action="/project-delete/{{ $choice->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-full inline-block"
                                                type="submit"><i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <div id="editProjectModal" tabindex="-1" aria-hidden="true"
                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t">
                                                        <h3 class="text-xl font-semibold text-gray-900">
                                                            Edit Project Type
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                            data-modal-hide="editProjectModal">
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
                                                    <form id="edit_form" class="p-6 space-y-6">
                                                        @csrf
                                                        <div class="p-6 space-y-6">
                                                            <div class="mb-4">
                                                                <label for="department"
                                                                    class="block text-gray-700 font-bold mb-2">Department:</label>
                                                                <input type="text" name="department"
                                                                    id="edit_department"
                                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 font-bold mb-2">Project
                                                                    Name:</label>
                                                                <input type="text" name="name" id="edit_name"
                                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                            </div>
                                                            <div class="flex items-center justify-between">
                                                                <button type="submit"
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
                                                                    Changes</button>
                                                                <button data-modal-hide="editProjectModal"
                                                                    type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        //Edit Intern Modal
        $(document).on("click", ".editProjectList", function() {
            $tr = $(this).closest('tr');

            var editprojectData = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(editprojectData);

            $('#edit_department').val(editprojectData[0].trim());
            $('#edit_name').val(editprojectData[1].trim());
        });
    </script>
</x-layout>
