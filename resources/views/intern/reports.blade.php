<x-layout module_name="Reports">
    <div class="container">
        <title>Payreto | Timesheet Reports</title>
        <h1 class="text-3xl font-bold">Timesheet Report</h1>
        <form method="get" action="/intern/reports/filter" class="mt-8">
            <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                <div class="flex-1">
                    <label for="start_date" class="block text-gray-700 font-bold mb-2">From Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="start_date"
                        name="start_date" value="{{ app('request')->input('start_date') ?? old('start_date')}}" required>
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-gray-700 font-bold mb-2">To Date:</label>
                    <input type="date" class="form-input rounded-md shadow-sm w-full" id="end_date" name="end_date"
                        value="{{ app('request')->input('end_date') ?? old('end_date')}}" required>
                </div>
                <div>
                    <button type="submit"
                        class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-blue-700 focus:outline-none 
                        focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">Apply Filter</button>
                </div>
            </div>
        </form>
        <div class="flex mt-8">
            <form method="post" action="/intern/reports/export">
                @csrf
                <input type="hidden" name="start_date" value="{{ app('request')->input('start_date') ?? old('start_date') ?? date('Y-m-d') }}">
                <input type="hidden" name="end_date" value="{{ app('request')->input('end_date') ?? old('end_date') ?? date('Y-m-d') }}">
                <input type="hidden" name="export_csv" value="true">
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-green-500
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4">Export to CSV</button>
            </form>
            <form method="post" action="/intern/reports/export">
                @csrf
                <input type="hidden" name="start_date" value="{{ $start_date ?? date('Y-m-d') }}">
                <input type="hidden" name="end_date" value="{{ $end_date ?? date('Y-m-d') }}">
                <input type="hidden" name="export_xlsx" value="true">
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-yellow-500 
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4">Export to XLSX</button>
            </form>
        <form method="post" action="/intern/reports/export">
                @csrf
                <input type="hidden" name="start_date" value="{{ $start_date ?? date('Y-m-d') }}">
                <input type="hidden" name="end_date" value="{{ $end_date ?? date('Y-m-d') }}">
                <input type="hidden" name="export_pdf" value="true">
                <button type="submit" class="btn btn-primary px-4 py-2 text-white font-bold rounded bg-red-500 
                hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-700 transition duration-150 ease-in-out mr-4">Export to PDF</button>
            </form>
        </div>
        <hr class="my-8">
        @if ($timesheets->isEmpty())
            <p class="text-gray-700">No data found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 font-bold uppercase">Date</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Name</th>
                            <th class="py-2 px-4 font-bold uppercase">Project Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Task Type</th>
                            <th class="py-2 px-4 font-bold uppercase">Start Time</th>
                            <th class="py-2 px-4 font-bold uppercase">End Time</th>
                            <th class="py-2 px-4 font-bold uppercase">Duration</th>
                            <th class="py-2 px-4 font-bold uppercase">Total Allowance Computed (in PHP)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach ($timesheets as $timesheet)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td>{{ $timesheet->start_time->format('Y-m-d') }}</td>
                                <td>{{ $timesheet->task_name }}</td>
                                <td>{{ $timesheet->project_type }}</td>
                                <td>{{ $timesheet->task_type }}</td>
                                <td>{{ $timesheet->start_time->format('h:i A') }}</td>
                                <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                                <td>{{ $timesheet->billable? $timesheet->getBillableDurationAttribute() : 'Not Billable' }}</td>
                                <td>{{ $timesheet->billable? $timesheet->rate : 'Not Billable' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
