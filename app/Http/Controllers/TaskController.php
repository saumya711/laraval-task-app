<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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

    return redirect('/')->with('success', 'Task created successfully!');
}
}
