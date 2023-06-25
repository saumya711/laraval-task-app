<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function create()
{
    return view('task.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'category' => 'required',
    ]);

    Task::create($validatedData);

    return redirect('task-list')->with('success', 'Task created successfully!');
}
}
