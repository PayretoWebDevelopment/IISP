<x-layout module_name="Reports">
<div class="container">
    <h1>Timesheet Report</h1>
        <form method="get" action="/intern/reports/filter">
            <div class="form-group">
                <label for="start_date">From Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">To Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filter</button>
            {{-- <a href="{{ route('report.export', ['format' => 'pdf', 'start_date' => old('start_date'), 'end_date' => old('end_date')]) }}" class="btn btn-secondary">Export to PDF</a>
            <a href="{{ route('report.export', ['format' => 'csv', 'start_date' => old('start_date'), 'end_date' => old('end_date')]) }}" class="btn btn-secondary">Export to CSV</a>
            <a href="{{ route('report.export', ['format' => 'xlsx', 'start_date' => old('start_date'), 'end_date' => old('end_date')]) }}" class="btn btn-secondary">Export to XLSX</a> --}}
        </form>

    <hr>
    @if($timesheets->isEmpty())
            <p>No data found.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Task Name</th>
                <th>Project Type</th>
                <th>Task Type</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timesheets as $timesheet)
            <tr>
                <td>{{ $timesheet->created_at->format('Y-m-d') }}</td>
                <td>{{ $timesheet->task_name }}</td>
                <td>{{ $timesheet->project_type }}</td>
                <td>{{ $timesheet->task_type }}</td>
                <td>{{ $timesheet->start_time->format('h:i A') }}</td>
                <td>{{ $timesheet->end_time ? $timesheet->end_time->format('h:i A') : '' }}</td>
                <td>{{ $timesheet->getDurationAttribute() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</x-layout>
