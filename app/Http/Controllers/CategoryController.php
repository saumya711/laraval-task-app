<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $categoryData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create($categoryData);
        return redirect('task-list');
    }
}
