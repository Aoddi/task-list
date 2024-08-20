<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
//        'tasks' => []
    ]);
})->name('tasks.index') ;

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

//Route::get('/dashboard', function () {
//    return 'dashboard';
//})->name('dashboard');
//
//Route::get('/dushboard', function () {
//    return redirect()->route('dashboard');
//});
//
//Route::get('greet/{name}', function ($name = null) {
//    return 'Hello ' . $name . '!';
//});

Route::fallback(function () {
    return 'Page not found';
});
