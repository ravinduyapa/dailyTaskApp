<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data = App\Models\Task::all();
    return view('tasks')->with('tasks', $data);
});

Route::post('/saveTask', [TaskController::class, 'store']);

Route::get('/markascompleted/{id}', [TaskController::class, 'updateTaskAsCompleted']);

Route::get('/markasnotcompleted/{id}', [TaskController::class, 'updateTaskAsNotCompleted']);

Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask']);

Route::get('/updatetask/{id}', [TaskController::class, 'updateTask']);

Route::post('/updatetasks', [TaskController::class, 'updateTasks']);


