<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
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
        'tasks' => Task::latest()->get(), // will fetch the most recent tasks first

        // If we pass html tags to the variable, they would be escaped by Laravel and displayed as text
        // 'name' => '<b>Nataly</b>' // will be escaped
        // 'name' => '<script></script>' // will be escaped
    ]);
})->name('tasks.index');

// In cases where we don't need to fetch any additional data, we don't need to use 'get' method of the route class
// We can just use the 'view', where we would define the URL and pass the name of the view
Route::view('/tasks/create', 'create')->name('tasks.create');

// Model binding - feature in Laravel, when Laravel automatically resolves a model instance based on the type hinted variable name in the route definition.
// Instead of using an 'id' argument, we can rename it to 'task' and use the function argument with the same name.
// If we add the task class, which is the Task model, we don't need to call findOrFail.  It'll automatically fetch the model from the database.
// If the model won't be found, it will throw the Model not found exception, which in Laravel means a 404 page.
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    // To get one record from the database table using the model, we refer to the model and call it's method
    // 'find' - fetches a record from the database by a specific primary key. If it won't find the record in the database, it would return null and we'll get ar error
    // 'findOrFail' - if it won't find a record by specific primary key ('id' in our case), it will call the abort function with 404 code

    // return view named 'show' and pass $task to the view
    return view('show', ['task' => $task]);
})->name('tasks.show');

// 'request' gives us access to the data that is being sent
Route::post('/tasks', function (TaskRequest $request) {
    // // Data is available inside the 'request'
    // $data = $request->validated(); // will contain the validated data

    // Instead of setting attributes individually and calling 'save',
    // We can use the 'Model::create' static method and pass an array with the data.
    // We can directly pass the validated request data, which returns an array of column names and values
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id]) // will redirect user to the newly saved task
        // with('variable name', 'message') is used to add a Flash message (here it will be displayed after a new task is successfully stored)
        // Flash messages will be removed, after we access them the first time. They will not be in the session anymore on subsequent requests
        ->with('success', 'Task created successfully!'); 
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // For updates, use the update method. It works similarly to create but operates on an existing model.
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!'); 
})->name('tasks.update');

// // Redirects from 'hallo' route to 'hello
// Route::get('/hallo', function () {
//     // return redirect('/hello');
//     return redirect()->route('hello'); // redirects to the named route 'hello'
// });

// Fallback route - all routes that don't exist will redirect to this page 
Route::fallback(function () {
    return 'Still got somewhere';
});
