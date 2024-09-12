<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager | ALX SE Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
        }

        .header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            margin: 0;
        }

        .header p {
            font-size: 1.2rem;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-title {
            font-weight: bold;
            color: #0d6efd;
            font-size: 1.75rem;
        }

        .input-group input {
            border-radius: 10px 0 0 10px;
            border-right: none;
        }

        .input-group .btn {
            border-radius: 0 10px 10px 0;
        }

        .list-group-item {
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .list-group-item.completed {
            background-color: #e9f7ef;
            color: #155724;
        }

        .task-actions button {
            margin-left: 10px;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <h1>Task Manager</h1>
        <p>A portfolio project for obtaining a Software Engineering Degree from ALX Africa</p>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="card shadow-sm p-4">
            <h2 class="card-title text-center mb-4">Manage Your Tasks Efficiently</h2>

            <!-- Task Creation Form -->
            <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="input-group">
                    <input type="text" name="title" class="form-control"
                        placeholder="What do you want to accomplish?" required>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </form>

            <!-- Task List -->
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center @if ($task->is_completed) completed @endif">
                        <span class="@if ($task->is_completed) text-decoration-line-through @endif">
                            {{ $task->title }}
                        </span>
                        <div class="task-actions">
                            @if (!$task->is_completed)
                                <form action="{{ route('tasks.update', $task) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success btn-sm">Complete</button>
                                </form>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif

                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 by Abderrahman bouichou | ALX Africa SE Portfolio
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
