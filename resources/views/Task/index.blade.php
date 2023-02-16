<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Task/index.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
    <style>

    </style>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="header">
            <h3>all your tasks</h3>
        </div>
        <div class="btns">
            <form action="/tasks" method="POST">
                @csrf
                <select name="dateSort" id="">
                    <option value="asc">date (asc)</option>
                    <option value="desc">date (desc)</option>
                </select>
                <select name="" id="">

                </select>
                <input type="submit" name="" id="" value="filter">
                {{-- <input type="submit" name="" id="" value="clear"> --}}
            </form>
            <x-create-button href="tasks.create">create a new task</x-create-button>
        </div>
        <div class="tasksTable">
            <table>
                <thead>
                    <th>Task Title</th>
                    <th>Task Project</th>
                    <th>Deadline</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
                            <td><a href="{{ route('projects.show', $task->project_id) }}">
                                    {{ App\Models\Project::find($task->project_id)->title }}</a></td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->is_completed }}</td>
                            <td class="lastTd">
                                <x-edit-button href='tasks.edit' :id='$task'>
                                    <p>edit</p>
                                </x-edit-button>
                                <x-delete-button route="tasks.destroy" :object='$task' />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $tasks->links() }}
    </div>
</body>

</html>
