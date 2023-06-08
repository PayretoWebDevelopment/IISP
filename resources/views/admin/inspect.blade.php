<x-layout module_name="Timesheets">

    <div class="m-10 w-10/12">
        <h1 class="text-3xl font-bold">Recorded Entries for {{ $user->name }}</h1>
        {{-- <div class="flex mt-8">
            <form method="post" action="/intern/reports/export">
                @csrf
                <input type="hidden" name="start_date" value="{{ $start_date ?? date('Y-m-d') }}">
                <input type="hidden" name="end_date" value="{{ $end_date ?? date('Y-m-d') }}">
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
        </div> --}}
        <hr class="my-8">
        @if ($timesheets->isEmpty())
            <p class="text-gray-700">No data found.</p>
        @else
            <div class="overflow-x-auto">
                <div class="bg-white border border-gray-200 rounded-lg shadow p-5">
                    <table class="w-full text-sm text-left text-gray-500" id="inspectTable" style="width:100%">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Task Name</th>
                                <th scope="col" class="px-6 py-3">Project Type</th>
                                <th scope="col" class="px-6 py-3">Task Type</th>
                                <th scope="col" class="px-6 py-3">Start Time</th>
                                <th scope="col" class="px-6 py-3">End Time</th>
                                <th scope="col" class="px-6 py-3">Duration</th>
                                <th scope="col" class="px-6 py-3">Total Allowance Computed (in PHP)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timesheets as $timesheet)
                                <tr class="bg-white border-b">
                                    <td>{{ $timesheet->start_time->format('Y-m-d') }}</td>
                                    <td>{{ $timesheet->task_name }}</td>
                                    <td>{{ $timesheet->project_type }}</td>
                                    <td>{{ $timesheet->task_type }}</td>
                                    <td>{{ $timesheet->start_time->format('h:i A') }}</td>
                                    <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                                    <td>{{ $timesheet->getDurationAttribute() }}</td>
                                    <td>{{ $timesheet->rate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</x-layout>
