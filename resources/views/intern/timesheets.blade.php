<x-layout module_name="Timesheets">
    <div class="bg-gray-200 p-5">
        <form method = "POST" action="/timesheet">
            @csrf
            <div style="display:inline;">
                <label for="task_name">Task Name:</label>
                <input type="text" name="task_name" id="task_name" required>
            </div>
            <div style="display:inline;">
                <label for="project_type">Project Type:</label>
                <select id="project_type" name ="project_type">
                    <option value="">Choose project type</option>
                    <option value="dds" {{old('task_type') == 'dds' ? 'selected' : ''}}>Deep Dive Session</option>
                    <option value="meeting" {{old('task_type') == 'meeting' ? 'selected' : ''}}>Meeting</option>
                    <option value="debugging" {{old('task_type') == 'debugging' ? 'selected' : ''}}>Debugging</option>
                </select>
            </div>
            <div style="display:inline;">
                <label for="task_type">Task Type:</label>
                <select id="task_type" name ="task_type">
                    <option value="">Choose task type</option>
                    <option value="task" {{old('task_type') == 'task' ? 'selected' : ''}}>TASK</option>
                    <option value="break" {{old('task_type') == 'break' ? 'selected' : ''}}>BREAK</option>
                    <option value="login" {{old('task_type') == 'login' ? 'selected' : ''}}>LOGIN</option>
                    <option value="logout" {{old('task_type') == 'logout' ? 'selected' : ''}}>LOGOUT</option>
                    <option value="lunch" {{old('task_type') == 'lunch' ? 'selected' : ''}}>LUNCH</option>
                    <option value="webinar" {{old('task_type') == 'webinar' ? 'selected' : ''}}>WEBINAR</option>
                </select>
            </div>
            <div style="display:inline;">
                <label for="start_time">Start Time:</label>
                <input type="text" name="start_time" id="start_time" value="{{now()->format('H:i:s')}}" required>
            </div>
            <div style="display:inline">
                <button type="submit" name="action" value="start">Start Timer</button>
            </div>
        </form>
    </div>


    <div class="m-10 w-10/12">
        <h1>Recorded Entries</h1>
        @foreach($timesheets->groupBy(function($entry){
                return $entry->created_at->format('Y-m-d');
            }) as $date => $entries)
            <h2><b>{{$date}}</b></h2>
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
                    @foreach ($timesheets as $timesheet)
                        <tr>
                            <td>{{$timesheet->created_at->format('Y-m-d')}}</td>
                            <td>{{$timesheet->task_name}}</td>
                            <td>{{$timesheet->project_type}}</td>
                            <td>{{$timesheet->task_type}}</td>
                            <td>{{$timesheet->start_time->format('H:i:s')}}</td>
                            <td>{{$timesheet->end_time ? $timesheet->end_time->format('H:i:s') : ''}}</td>
                            <td>{{$timesheet->getDurationAttribute()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</x-layout>

