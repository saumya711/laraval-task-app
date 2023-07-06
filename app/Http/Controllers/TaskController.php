<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $categories = Category::all();
        return view('task.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('task.create', ['categories' => $categories]);
    
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required|exists:task_categories,id', // Ensure the selected category exists in the task_categories table
        ]);

        $task = new Task();
        $task->name = $validatedData['name'];
        $task->category_id = $validatedData['category'];
        $task->save();

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
