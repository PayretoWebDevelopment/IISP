// Script for hiding fields when admin role is selected
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
