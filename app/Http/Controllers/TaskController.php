<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        // Retrieve all tasks from the database
        $tasks = Task::all();

        // Pass tasks to the 'index' view
        return view('index', compact('tasks'));
    }

    // Store a new task
    public function store(Request $request)
    {
        // Validate the input, ensuring the 'title' field is required and has a max length of 255 characters
        $request->validate([
            'title' => 'required|max:255',
        ]);

        // Create a new task with the provided title and set 'is_completed' to false
        Task::create([
            'title' => $request->title,
            'is_completed' => false,
        ]);

        // Redirect back to the task list
        return redirect()->route('tasks.index');
    }

    // Mark a task as completed
    public function update(Task $task)
    {
        // Update the task's 'is_completed' field to true
        $task->update(['is_completed' => true]);

        // Redirect back to the task list
        return redirect()->route('tasks.index');
    }

    // Delete a task
    public function delete(Task $task)
    {
        // Delete the specified task from the database
        $task->delete();

        // Redirect back to the task list
        return redirect()->route('tasks.index');
    }
}
