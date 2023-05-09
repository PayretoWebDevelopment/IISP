<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['moduleName' => 'Timesheets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['module_name' => 'Timesheets']); ?>
    <div class="bg-gray-200 p-5">
        <form method = "POST" action="/timesheet">
            <?php echo csrf_field(); ?>
            <div style="display:inline;">
                <label for="task_name">Task Name:</label>
                <input type="text" name="task_name" id="task_name" required>
            </div>
            <div style="display:inline;">
                <label for="project_type">Project Type:</label>
                <select id="project_type" name ="project_type">
                    <option value="">Choose project type</option>
                    <option value="dds" <?php echo e(old('task_type') == 'dds' ? 'selected' : ''); ?>>Deep Dive Session</option>
                    <option value="meeting" <?php echo e(old('task_type') == 'meeting' ? 'selected' : ''); ?>>Meeting</option>
                    <option value="debugging" <?php echo e(old('task_type') == 'debugging' ? 'selected' : ''); ?>>Debugging</option>
                </select>
            </div>
            <div style="display:inline;">
                <label for="task_type">Task Type:</label>
                <select id="task_type" name ="task_type">
                    <option value="">Choose task type</option>
                    <option value="task" <?php echo e(old('task_type') == 'task' ? 'selected' : ''); ?>>TASK</option>
                    <option value="break" <?php echo e(old('task_type') == 'break' ? 'selected' : ''); ?>>BREAK</option>
                    <option value="login" <?php echo e(old('task_type') == 'login' ? 'selected' : ''); ?>>LOGIN</option>
                    <option value="logout" <?php echo e(old('task_type') == 'logout' ? 'selected' : ''); ?>>LOGOUT</option>
                    <option value="lunch" <?php echo e(old('task_type') == 'lunch' ? 'selected' : ''); ?>>LUNCH</option>
                    <option value="webinar" <?php echo e(old('task_type') == 'webinar' ? 'selected' : ''); ?>>WEBINAR</option>
                </select>
            </div>
            <div style="display:inline;">
                <label for="start_time">Start Time:</label>
                <input type="text" name="start_time" id="start_time" value="<?php echo e(now()->format('H:i:s')); ?>" required>
            </div>
            <div style="display:inline">
                <button type="submit" name="action" value="start">Start Timer</button>
            </div>
        </form>
    </div>


    <div class="m-10 w-10/12">
        <h1>Recorded Entries</h1>
        <?php $__currentLoopData = $timesheets->groupBy(function($entry){
                return $entry->created_at->format('Y-m-d');
            }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2><b><?php echo e($date); ?></b></h2>
            <table>
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
                    <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($timesheet->created_at->format('Y-m-d')); ?></td>
                            <td><?php echo e($timesheet->task_name); ?></td>
                            <td><?php echo e($timesheet->project_type); ?></td>
                            <td><?php echo e($timesheet->task_type); ?></td>
                            <td><?php echo e($timesheet->start_time->format('H:i:s')); ?></td>
                            <td><?php echo e($timesheet->end_time ? $timesheet->end_time->format('H:i:s') : ''); ?></td>
                            <td><?php echo e($timesheet->getDurationAttribute()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

<?php /**PATH /home/cabox/workspace/iisp/resources/views/intern/timesheets.blade.php ENDPATH**/ ?>