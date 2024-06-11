<?php

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

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

// To pass data to the template we can use a second argument of the view function
// It should be an array, keys would be the names of the variables
Route::get('/', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks

        // If we pass html tags to the variable, they would be escaped by Laravel and displayed as text
        // 'name' => '<b>Nataly</b>' // will be escaped
        // 'name' => '<script></script>' // will be escaped
    ]);
})->name('tasks.index');

Route::get('/{id}', function ($id) {
    return 'One single task';
})->name('tasks.show');

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
