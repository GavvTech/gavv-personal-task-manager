<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <h1><center>Personal Task Manager</center></h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tasks as $task)

                <tr>
                    <td>{{ $task->task_name }}</td>

                    <td>{{ $task->description }}</td>

                    <td>{{ $task->status }}</td>

                    <td>{{ $task->due_date }}</td>

                    <td>

                        <a href="{{ route('tasks.edit', $task->id) }}"
                           class="edit-button">
                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete-button">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        No tasks yet.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="add-task-container">
        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add New Task
        </a>
    </div>

</div>

</body>
</html>
