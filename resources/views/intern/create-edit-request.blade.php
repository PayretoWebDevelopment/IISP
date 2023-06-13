<x-layout>
    <form action="/users/profile/create-edit-request/send" method="POST" onsubmit="return validateForm()">
        @csrf
        <h3 class="text-xl font-semibold text-gray-900">
            Create Edit Request
        </h3>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="modified_fields" value="[]">
        <div class="space-y-4">
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_name" value="1"
                    id="edit_name">
                <label class="ml-2 block text-sm text-gray-900" for="edit_name">Name</label>
                <input type="text" name="name" id="name" class="form-input ml-4 hidden"
                    value="{{ $user->name }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_email" value="1"
                    id="edit_email">
                <label class="ml-2 block text-sm text-gray-900" for="edit_email">
                    Email
                </label>
                <input type="email" name="email" id="email" class="form-input ml-4 hidden"
                    value="{{ $user->email }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_contact_number"
                    value="1" id="edit_contact_number">
                <label class="ml-2 block text-sm text-gray-900" for="edit_contact_number">
                    Contact Number
                </label>
                <input type="text" name="contact_number" id="contact_number" class="form-input ml-4 hidden"
                    value="{{ $user->contact_number }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_position" value="1"
                    id="edit_position">
                <label class="ml-2 block text-sm text-gray-900" for="edit_position">
                    Position
                </label>
                <input type="text" name="position" id="position" class="form-input ml-4 hidden"
                    value="{{ $user->position }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox"
                    name="edit_department" value="1" id="edit_department">
                <label class="ml-2 block text-sm text-gray-900" for="edit_department">
                    Department
                </label>
                <select class="form-input ml-4 hidden" name="department" id="department">
                    @foreach ($department_list as $department)
                        <option value="{{ $department }}" {{ $department == $user->department ? 'selected' : '' }}>
                            {{ $department }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_start_date"
                    value="1" id="edit_start_date">
                <label class="ml-2 block text-sm text-gray-900" for="edit_start_date">
                    Start Date
                </label>
                <input type="date" class="form-input ml-4 hidden" id="start_date" name="start_date"
                    value="{{ $user->start_date }}" required>
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox" name="edit_hourly_rate"
                    value="1" id="edit_hourly_rate">
                <label class="ml-2 block text-sm text-gray-900" for="edit_hourly_rate">
                    Hourly Rate
                </label>
                <input type="number" name="hourly_rate" id="hourly_rate" class="form-input ml-4 hidden"
                    value="{{ $user->hourly_rate }}" step="any">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox"
                    name="edit_required_hours" value="1" id="edit_required_hours">
                <label class="ml-2 block text-sm text-gray-900" for="edit_required_hours">
                    Required Hours
                </label>
                <input type="number" name="required_hours" id="required_hours" class="form-input ml-4 hidden"
                    value="{{ $user->required_hours }}" step="any">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox"
                    name="edit_bank" value="1" id="edit_bank">
                <label class="ml-2 block text-sm text-gray-900" for="edit_bank">
                    Bank
                </label>
                <input type="text" name="bank" id="bank" class="form-input ml-4 hidden"
                    value="{{ $user->bank }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox"
                    name="edit_supervisor" value="1" id="edit_supervisor">
                <label class="ml-2 block text-sm text-gray-900" for="edit_supervisor">
                    Supervisor
                </label>
                <input type="text" name="supervisor" id="supervisor" class="form-input ml-4 hidden"
                    value="{{ $user->supervisor }}">
            </div>
            <div class="flex items-center">
                <input class="form-checkbox h-5 w-5 text-indigo-600" type="checkbox"
                    name="edit_bank_account_no" value="1" id="edit_bank_account_no">
                <label class="ml-2 block text-sm text-gray-900" for="edit_bank_account_no">
                    Bank Account Number
                </label>
                <input type="number" name="bank_account_no" id="bank_account_no" class="form-input ml-4 hidden"
                    value="{{ $user->bank_account_no }}">
            </div>
        </div>

        <div class="mt-6">
            <label for="reason" class="block text-sm font-medium leading-5 text-gray-700">
                Reason for edit request:
            </label>
            <div class="mt-1 rounded-md shadow-sm">
                <textarea id="reason" name="reason" rows="5"
                    class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('reason') }}</textarea>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Send Edit Request
            </button>
        </div>

        <script>
            //script for edit-request checkboxes
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            const modifiedInputs = new Set();
            const modifiedFieldsInput = document.querySelector('input[name="modified_fields"]');

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('click', () => {
                    const inputId = checkbox.id.replace('edit_', '');
                    const input = document.querySelector(`#${inputId}`);
                    if (checkbox.checked) {
                        input.classList.remove('hidden');
                        modifiedInputs.add(input.classList[
                            0]); // add the first class of the input element to the set
                    } else {
                        input.classList.add('hidden');
                        modifiedInputs.delete(input.classList[
                            0]); // remove the first class of the input element from the set
                    }
                    // Get the names of all checked checkboxes
                    const modifiedFieldNames = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.name.replace(/^edit_/, ''));

                    // Update the value of the modified_fields input element
                    modifiedFieldsInput.value = JSON.stringify(modifiedFieldNames);
                });
            });

            //script for validator
            function validateForm() {
                const reasonInput = document.getElementById('reason');
                const reasonValue = reasonInput.value.trim();
                if (reasonValue === '') {
                    alert('Please provide a reason');
                    reasonInput.focus();
                    return false;
                }
                return true;
            }
        </script>
</x-layout>
