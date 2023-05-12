<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
			<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($employee->id); ?></td>
				<td><?php echo e($employee->name); ?></td>
				<td><?php echo e($employee->role); ?></td>
				<td><?php echo e($employee->hourly_rate); ?></td>
				<td><?php echo e($employee->required_hours); ?></td>
				<td><?php echo e($employee->department); ?></td>
				<td>
					<a href="/employee/edit/<?php echo e($employee->id); ?>">Edit</a>
					<a href="/employee/delete/<?php echo e($employee->id); ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/cabox/workspace/iisp/resources/views/admin/employeelist.blade.php ENDPATH**/ ?>