<x-layout>
<h1>Employee List</h1>
    <a href="/employee/add">Add Employee</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Role</th>
				<th>Hourly Rate</th>
				<th>Required Hours</th>
				<th>Department</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<!-- Iterate over employees and populate table rows -->
			@foreach ($employees as $employee)
			<tr>
				<td>{{ $employee->id }}</td>
				<td>{{ $employee->name }}</td>
				<td>{{ $employee->role }}</td>
				<td>{{ $employee->hourly_rate }}</td>
				<td>{{ $employee->required_hours }}</td>
				<td>{{ $employee->department }}</td>
				<td>
					<a href="/employee/edit/{{ $employee->id }}">Edit</a>
					<a href="/employee/delete/{{ $employee->id }}">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</x-layout>
