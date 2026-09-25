<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <h1><center>Add New Task</center></h1>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label>Task Name</label>
        <input type="text" name="task_name" placeholder="Enter task name">

        <label>Description</label>
        <textarea name="description" placeholder="Enter task description"></textarea>

        <label>Status</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>

        <label>Due Date</label>
        <input type="date" name="due_date">

        <button type="submit" class="save-button">
            Save Task
        </button>

    </form>

    <a href="{{ route('tasks.index') }}" class="back-button">
        ← Back to Tasks
    </a>

</div>

</body>
</html>
