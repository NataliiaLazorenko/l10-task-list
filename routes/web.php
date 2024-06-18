<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
    return redirect()->route('tasks.index');
});

// To pass data to the template we can use a second argument of the view function
// It should be an array, keys would be the names of the variables
Route::get('/tasks', function () {
    return view('index', [
        // 'tasks' => \App\Models\Task::all(), // will fetch all the records of a particular model
        // 'tasks' => \App\Models\Task::latest()->where('completed', true)->get(), // will fetch only completed tasks
        'tasks' => \App\Models\Task::latest()->get(), // will fetch the most recent tasks first

        // If we pass html tags to the variable, they would be escaped by Laravel and displayed as text
        // 'name' => '<b>Nataly</b>' // will be escaped
        // 'name' => '<script></script>' // will be escaped
    ]);
})->name('tasks.index');

// In cases where we don't need to fetch any additional data, we don't need to use 'get' method of the route class
// We can just use the 'view', where we would define the URL and pass the name of the view
Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    // To get one record from the database table using the model, we refer to the model and call it's method
    // 'find' - fetches a record from the database by a specific primary key. If it won't find the record in the database, it would return null and we'll get ar error
    // 'findOrFail' - if it won't find a record by specific primary key ('id' in our case), it will call the abort function with 404 code

    // return view named 'show' and pass $task to the view
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

// 'request' gives us access to the data that is being sent
Route::post('/tasks', function (Request $request) {
    // dd - dump and die
    // $request->all() is how you read all the data fields that were submitted to a form
    dd($request->all());
})->name('tasks.store');

// // ->name('route_name') - adds the name to the route
// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// // Redirects from 'hallo' route to 'hello
// Route::get('/hallo', function () {
//     // return redirect('/hello');
//     return redirect()->route('hello'); // redirects to the named route 'hello'
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . "!";
// });

// Fallback route - all routes that don't exist will redirect to this page 
Route::fallback(function () {
    return 'Still got somewhere';
});
