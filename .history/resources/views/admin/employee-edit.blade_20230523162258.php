<x-layout>
    <title>Payreto | Edit Employee Information</title>
    <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>
    <form action="/admin/employee-update/{{ $employee->id }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Full Name:</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->name }}">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
            <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->username }}">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->email }}">
        </div>
        <div class="mb-4">
            <label for="contact_number" class="block text-gray-700 font-bold mb-2">Contact number:</label>
            <input type="number" name="contact_number" id="contact_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->contact_number }}">
        </div>
        <div class="mb-4">
            <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
            <input type="text" name="position" id="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->position }}">
        </div>
        <div class="mb-4">
            <label for="department" class="block text-gray-700 font-bold mb-2">Department (Dropdown):</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="department" required value="{{ $employee->department }}">
                @foreach ($department_list as $department)
                    <option value="{{$department}}" {{($department == $employee->department) ? 'selected':''}}>{{$department}}</option>
                @endforeach
            </select>
            <!--<input type="text" name="department" id="department" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->department }}">-->
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->start_date }}">
        </div>
        <div class="mb-4" id="active">
            <label for="active" class="block text-gray-700 font-bold mb-2">Active:</label>
            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="active"
                {{ $employee->start_date ? 'checked' : '' }} value="1" @if (old('active') == 1) checked @endif />
        </div>
        @if ($role === 'superadmin')
        <div class="mb-4" id="hourly_rate">
            <label for="active" class="block text-gray-700 font-bold mb-2">Hourly rate:</label>
            <input type="number" name="hourly_rate" id="hourly_rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->hourly_rate }}" step="0.01">
        </div>
        @endif
        <div class="mb-4">
            <label for="required_hours" class="block text-gray-700 font-bold mb-2">Required Hours:</label>
            <input type="number" name="required_hours" id="required_hours" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->required_hours }}">
        </div>
        <div class="mb-4">
            <label for="bank" class="block text-gray-700 font-bold mb-2">Bank:</label>
            <input type="text" name="bank" id="bank" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->bank }}">
        </div>
        <div class="mb-4">
            <label for="bank_account_no" class="block text-gray-700 font-bold mb-2">Bank Account No:</label>
            <input type="number" name="bank_account_no" id="bank_account_no" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->bank_account_no }}">
        </div>
        <div class="mb-4">
            <label for="supervisor" class="block text-gray-700 font-bold mb-2">Name of supervisor:</label>
            <input type="text" name="supervisor" id="supervisor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->supervisor }}">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
            <a href="/admin/employee-list/" class="text-blue-500 hover:text-blue-700 font-bold">Cancel</a>
        </div>
    </form>
    <br>
    @if ($role === 'admin')
    <h1 class="text-2xl font-bold mb-4">Edit Employee Hourly Rate</h1>
    <form action="/admin/employee-edit-hourly-rate/{{ $employee->id }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="mb-4">
            <label for="hourly_rate" class="block text-gray-700 font-bold mb-2">Hourly rate:</label>
            <input type="number" name="hourly_rate" id="hourly_rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $employee->hourly_rate }}" step="0.01">
        </div>
        <div class="mb-4">
            <label for="reason" class="block text-gray-700 font-bold mb-2">Reason:</label>
            <input type="text" name="reason" id="reason" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="">
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Request change</button>
        </div>
    </form>
    @endif
</x-layout>
