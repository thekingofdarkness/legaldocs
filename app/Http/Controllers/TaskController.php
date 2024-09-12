<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'is_completed' => false,
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Task $task)
    {
        $task->update(['is_completed' => true]);
        return redirect()->route('tasks.index');
    }
    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
