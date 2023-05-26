<x-layout module_name="Approvals">
    <title>Payreto | Approvals</title>
    <h1 class="text-2xl font-bold mb-4">Edit Request List</h1>
    <h2 class="text-lg font-bold mb-2">Pending Requests</h2>
    @if($approvals->isEmpty())
        <p>No pending requests found.</p>
    @else
    <form method="POST" action="/admin/approve-requests">
        @csrf
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow p-5">
            <table class=" divide-gray-200" id="internList" style="width:100%">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Requestor</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Profile to Edit</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Value to Edit</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">From</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">To</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Reason</th>
                        <th class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">Approve?</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iterate over approvals and populate table rows -->
                    @foreach ($approvals as $approval)
                        <tr>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->requestor->name }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->profile->name }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->field_to_edit }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->original_value }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->modified_value }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">{{ $approval->reason }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                @php
                                    $options = [
                                        1 => 'Yes',
                                        0 => 'No',
                                        null => 'Ignore'
                                    ];
                                @endphp
                                @foreach ($options as $value => $label)
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" name="approval[{{ $approval->id }}]" value="{{ $value }}" {{ $approval->approve == $value ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $label }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Approve pending requests</button>
        </div>
    </form>
    @endif

    {{-- Approved requests list --}}
    <h2 class="text-lg font-bold my-2">Approved Requests</h2>
    @if($approvedRequests->isEmpty())
    <p>No approved requests found.</p>
    @else
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Requestor</th>
                <th class="py-2 px-4 border">Profile to Edit</th>
                <th class="py-2 px-4 border">Value to Edit</th>
                <th class="py-2 px-4 border">From</th>
                <th class="py-2 px-4 border">To</th>
                <th class="py-2 px-4 border">Reason</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate over approved requests and populate table rows -->
            @foreach ($approvedRequests as $approval)
                <tr>
                    <td class="py-2 px-4 border">{{ $approval->requestor->name }}</td>
                    <td class="py-2 px-4 border">{{ $approval->profile->name }}</td>
                    <td class="py-2 px-4 border">{{ $approval->field_to_edit }}</td>
                    <td class="py-2 px-4 border">{{ $approval->original_value }}</td>
                    <td class="py-2 px-4 border">{{ $approval->modified_value }}</td>
                    <td class="py-2 px-4 border">{{ $approval->reason }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- Unapproved Requests list --}}
    <h2 class="text-lg font-bold my-2">Unapproved Requests</h2>
    @if($unapprovedRequests->isEmpty())
    <p>No unapproved requests found.</p>
    @else
    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Requestor</th>
                <th class="py-2 px-4 border">Profile to Edit</th>
                <th class="py-2 px-4 border">Value to Edit</th>
                <th class="py-2 px-4 border">From</th>
                <th class="py-2 px-4 border">To</th>
                <th class="py-2 px-4 border">Reason</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterate over unapproved requests and populate table rows -->
            @foreach ($unapprovedRequests as $approval)
                <tr>
                    <td class="py-2 px-4 border">{{ $approval->requestor->name }}</td>
                    <td class="py-2 px-4 border">{{ $approval->profile->name }}</td>
                    <td class="py-2 px-4 border">{{ $approval->field_to_edit }}</td>
                    <td class="py-2 px-4 border">{{ $approval->original_value }}</td>
                    <td class="py-2 px-4 border">{{ $approval->modified_value }}</td>
                    <td class="py-2 px-4 border">{{ $approval->reason }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</x-layout>
