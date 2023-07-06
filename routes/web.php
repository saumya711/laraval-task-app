<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

///Task COntroller///
Route::get('task-list',[TaskController::class,'index'])->name('task-list');
Route::get('task-create',[TaskController::class,'create'])->name('task-create');
Route::get('task-store',[TaskController::class,'store'])->name('task-store');
Route::get('task-edit/{id}',[TaskController::class,'edit'])->name('task-edit');
Route::put('task-update/{id}',[TaskController::class,'update'])->name('task-update');
Route::delete('task-delete/{id}',[TaskController::class,'destroy'])->name('task-delete');

///Category COntroller///
Route::get('category-create',[CategoryController::class,'create'])->name('category-create');
Route::post('category-store',[CategoryController::class,'store'])->name('category-store');


