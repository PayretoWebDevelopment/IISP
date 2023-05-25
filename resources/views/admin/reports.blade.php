<x-layout module_name="Reports">
    <title>Payreto | Reports</title>
    <div class="container mx-auto">
        <h1 class="font-bold text-gray-700">Reports</h1>
        {{-- REPORTS --}}
        <section>
            <form method="get" action="/admin/reports/filter" class="mt-8">
                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                    <div class="flex-1">
                        <label for="start_date" class="text-gray-700 font-bold mb-2">From Date:</label>
                        <input type="date"
                            class="w-96 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40"
                            id="start_date" name="start_date"
                            value="{{ app('request')->input('start_date') ?? old('start_date')}}"
                            required>
                    </div>
                    <div class="flex-1">
                        <label for="end_date" class="text-gray-700 font-bold mb-2">To Date:</label>
                        <input type="date"
                            class="w-96 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40"
                            id="end_date" name="end_date"
                            value="{{ app('request')->input('end_date') ?? old('end_date')}}"
                            required>
                    </div>
                    <button type="submit"
                        class="block px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Apply
                        Filter</button>
                </div>
            </form>

            <form id="export_form" method="post" action="/admin/reports/export_selection">
                @csrf
                <div class="flex justify-start mt-5">
                    <input type="hidden" name="start_date"
                        value="{{ app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d')) }}">
                    <input type="hidden" name="end_date"
                        value="{{ app('request')->input('end_date') ?? (old('start_date') ?? date('Y-m-d')) }}">
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-green-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_csv">Export to CSV</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-yellow-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_xlsx">Export to XLSX</button>
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-red-500
            hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4"
                            name="submit" value="export_pdf">Export to PDF</button>
                    </div>
                    <hr class="my-8">
                </div>
            </form>
        </section>
        {{-- END REPORTS --}}
        {{-- REPORT TABLE --}}
        <section>
            <div class="overflow-x-auto">
                <div>
                    @if ($timesheetsByUser->isEmpty())
                        <p class="text-gray-700">No data found.</p>
                    @else
                        <div class="mt-10">
                            <table class="min-w-full divide-y divide-gray-200" id="reportList" style="width:100%">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            <span class="hidden"></span>
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
                                            Position
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Hourly Rate
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Hours Rendered
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($timesheetsByUser as $user => $timesheets)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <input type="checkbox" name="timesheets[]" value={{ $user }}
                                                    form="export_form">
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ $timesheetsByUser[$user]['userReference']->name }}</td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ $timesheetsByUser[$user]['userReference']->role }}</td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ $timesheetsByUser[$user]['userReference']->position }}</td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ $timesheetsByUser[$user]['userReference']->hourly_rate }}</td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ floor($timesheetsByUser[$user]['total_hours_rendered'] / 3600) .
                                                    ':' .
                                                    floor(($timesheetsByUser[$user]['total_hours_rendered'] % 3600) / 60) .
                                                    ':' .
                                                    floor($timesheetsByUser[$user]['total_hours_rendered'] % 60) }}
                                            </td>
                                            <td class="m-auto">
                                                <form class="flex justify-center items-center" method="get"
                                                    action="/admin/reports/inspect/{{ $user }}" class="mt-8">
                                                    <input type="hidden" name="start_date"
                                                        value="{{ app('request')->input('start_date') ?? (old('start_date') ?? date('Y-m-d')) }}">
                                                    <input type="hidden" name="end_date"
                                                        value="{{ app('request')->input('end_date') ?? (old('end_date') ?? date('Y-m-d')) }}">
                                                    <div>
                                                        <button type="submit"
                                                            class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                            Inspect
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                @endif
            </div>
        </section>
        {{-- END REPORT TABLE --}}

    </div>
</x-layout>
