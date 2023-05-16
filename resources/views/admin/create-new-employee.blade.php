<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<x-layout>
    <title>Payreto IISP | Create new User</title>

    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a new employee</h2>
    </header>

    <form method="POST" action="/admin/create-new-employee/submit">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2"> Full name </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" id="name" name="name"
                value="{{ old('name') }}" />

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="inline-block text-lg mb-2">Username</label>
            <input type="username" class="border border-gray-200 rounded p-2 w-full" id="username" name="username"
                value="{{ old('username') }}" />

            @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" id="email" name="email"
                value="{{ old('email') }}" />

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="" />

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
                Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                value="" />

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="role" class="inline-block text-lg mb-2">Role</label>
            <select class="form-select border border-gray-200 rounded p-2 w-full" id="role" name="role"
                required>
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Intern">Intern</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="contact_number" class="inline-block text-lg mb-2">Contact number</label>
            <input type="contact_number" class="border border-gray-200 rounded p-2 w-full" id="contact_number" name="contact_number"
                value="{{ old('contact_number') }}" />

            @error('contact_number')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="position" class="inline-block text-lg mb-2">Position</label>
            <input type="position" class="border border-gray-200 rounded p-2 w-full" name="position"
                value="{{ old('position') }}" />

            @error('position')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="department" class="inline-block text-lg mb-2">Department</label>
            <input type="department" class="border border-gray-200 rounded p-2 w-full" name="department"
                value="{{ old('department') }}" />

            @error('department')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="start_date" >
            <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
            <input type="start_date" class="border border-gray-200 rounded p-2 w-full" name="start_date"
                value=""{{ old('start_date') }} />

            @error('start_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="active">
            <label for="active" class="inline-block text-lg mb-2">Active</label>
            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="active"
                {{ old('active') ? 'checked' : '' }} value="1" @if (old('active') == 1) checked @endif />

            @error('active')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6" id="hourly_rate">
            <label for="hourly_rate" class="inline-block text-lg mb-2">Hourly rate</label>
            <input type="hourly_rate" class="border border-gray-200 rounded p-2 w-full" name="hourly_rate"
                value="{{ old('hourly_rate') }}" />

            @error('hourly_rate')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="required_hours">
            <label for="required_hours" class="inline-block text-lg mb-2">Required hours</label>
            <input type="required_hours" class="border border-gray-200 rounded p-2 w-full"  name="required_hours"
                value="{{ old('required_hours') }}" />

            @error('required_hours')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="bank">
            <label for="bank" class="inline-block text-lg mb-2">Bank</label>
            <input type="bank" class="border border-gray-200 rounded p-2 w-full"  name="bank"
                value="{{ old('bank') }}" />

            @error('bank')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="bank_account_no">
            <label for="bank_account_no" class="inline-block text-lg mb-2">Bank account no.</label>
            <input type="bank_account_no" class="border border-gray-200 rounded p-2 w-full"  name="bank_account_no"
                value="{{ old('bank_account_no') }}" />

            @error('bank_account_no')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6" id="supervisor">
            <label for="supervisor" class="inline-block text-lg mb-2">Name of supervisor</label>
            <input type="supervisor" class="border border-gray-200 rounded p-2 w-full" name="supervisor"
                value="{{ old('supervisor') }}" />

            @error('supervisor')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create New Employee
            </button>
        </div>
    </form>

    {{-- script for hiding fields when admin role is selected --}}
    <script>
        const roleSelect = document.getElementById('role');
        const startDateInput = document.getElementById('start_date');
        const activeInput = document.getElementById('active');
        const hourlyRateInput = document.getElementById('hourly_rate');
        const requiredHoursInput = document.getElementById('required_hours');
        const bankInput = document.getElementById('bank');
        const bankAccountNoInput = document.getElementById('bank_account_no');
        const supervisorInput = document.getElementById('supervisor');
    
        roleSelect.addEventListener('change', () => {
          if (roleSelect.value === 'Admin') {
            startDateInput.classList.add('hidden');
            activeInput.classList.add('hidden');
            hourlyRateInput.classList.add('hidden');
            requiredHoursInput.classList.add('hidden');
            bankInput.classList.add('hidden');
            bankAccountNoInput.classList.add('hidden');
            supervisorInput.classList.add('hidden');
          } else {
            startDateInput.classList.remove('hidden');
            activeInput.classList.remove('hidden');
            hourlyRateInput.classList.remove('hidden');
            requiredHoursInput.classList.remove('hidden');
            bankInput.classList.remove('hidden');
            bankAccountNoInput.classList.remove('hidden');
            supervisorInput.classList.remove('hidden');
          }
        });
      </script>
    


</x-layout>
