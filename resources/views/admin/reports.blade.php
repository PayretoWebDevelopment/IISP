<x-layout module_name="Reports">
    <title>Payreto | Reports</title>
    <div class="container">
        <h1 class="text-3xl font-bold">Reports</h1>
        <form method="get" action="/admin/reports/filter" class="mt-8">
            <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                <div class="flex-1">
                    <label for="start_date" class="block text-gray-700 font-bold mb-2">From Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="start_date"
                        name="start_date" value="{{ app('request')->input('start_date') ?? old('start_date') ?? date('Y-m-d') }}" required>
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-gray-700 font-bold mb-2">To Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="end_date" name="end_date"
                        value="{{ app('request')->input('end_date') ?? old('start_date') ?? date('Y-m-d') }}" required>
                </div>
                <div>
                    <button type="submit"
                        class="bt`n btn-primary px-4 py-2 text-white font-bold rounded bg-blue-700 focus:outline-none 
                        focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">Apply
                        Filter</button>
                </div>
            </div>
        </form>
        <form id="export_form" method="post" action="/admin/reports/export_selection">
            @csrf
            <input type="hidden" name="start_date" value="{{ app('request')->input('start_date') ?? old('start_date') ?? date('Y-m-d') }}">
            <input type="hidden" name="end_date" value="{{ app('request')->input('end_date') ?? old('start_date') ?? date('Y-m-d') }}">
            <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-green-500 
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_csv">Export to CSV</button>
            <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-yellow-500 
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_xlsx">Export to XLSX</button>
            <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-red-500 
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4" name="submit" value = "export_pdf">Export to PDF</button>
            <hr class="my-8">
        </form>
    </div>
    <div class="flex mt-8">
            @if ($timesheetsByUser->isEmpty())
                <p class="text-gray-700">No data found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="py-2 px-4 font-bold uppercase"></th>
                                <th class="py-2 px-4 font-bold uppercase">Name</th>
                                <th class="py-2 px-4 font-bold uppercase">Role</th>
                                <th class="py-2 px-4 font-bold uppercase">Position</th>
                                <th class="py-2 px-4 font-bold uppercase">Hourly Rate</th>
                                <th class="py-2 px-4 font-bold uppercase">Hours Rendered</th>
                                <th class="py-2 px-4 font-bold uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($timesheetsByUser as $user => $timesheets)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td><input type="checkbox" name="timesheets[]" value={{$user}} form="export_form"></td>
                                        <td>{{ $timesheetsByUser[$user]['userReference']->name }}</td>
                                        <td>{{ $timesheetsByUser[$user]['userReference']->role }}</td>
                                        <td>{{ $timesheetsByUser[$user]['userReference']->position }}</td>
                                        <td>{{ $timesheetsByUser[$user]['userReference']->hourly_rate }}</td>
                                        <td>{{ floor($timesheetsByUser[$user]['total_hours_rendered'] / 3600) 
                                        . ':' 
                                        . floor(($timesheetsByUser[$user]['total_hours_rendered'] % 3600) / 60) 
                                        . ':' 
                                        . floor(($timesheetsByUser[$user]['total_hours_rendered'] % 60)) }}</td>
                                        <td>
                                            <form method="get" action="/admin/reports/inspect/{{$user}}" class="mt-8">
                                                <input type="hidden" name="start_date" value="{{ app('request')->input('start_date') ?? old('start_date') ?? date('Y-m-d') }}">
                                                <input type="hidden" name="end_date" value="{{ app('request')->input('end_date') ?? old('end_date') ?? date('Y-m-d') }}">
                                                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                                                        <button type="submit"
                                                            class="bt`n btn-primary px-4 py-2 text-white font-bold rounded bg-blue-700 focus:outline-none 
                                                            focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">Inspect</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

    {{-- </div> --}}
    </div>
</x-layout>
