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

// To pass data to the template we can use a second argument of the view function
// It should be an array, keys would be the names of the variables
Route::get('/', function () {
    return view('index', [
        'name' => 'Nataly'

        // If we pass html tags to the variable, they would be escaped by Laravel and displayed as text
        // 'name' => '<b>Nataly</b>' // will be escaped
        // 'name' => '<script></script>' // will be escaped
    ]);
});

// ->name('route_name') - adds the name to the route
Route::get('/hello', function () {
    return 'Hello';
})->name('hello');

// Redirects from 'hallo' route to 'hello
Route::get('/hallo', function () {
    // return redirect('/hello');
    return redirect()->route('hello'); // redirects to the named route 'hello'
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . "!";
});

// Fallback route - all routes that don't exist will redirect to this page 
Route::fallback(function () {
    return 'Still got somewhere';
});

// GET
// POST 
// PUT 
// DELETE 