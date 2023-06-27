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

    public function edit($id) 
    {
        $task = Task::FindOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect('task-list')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
}
