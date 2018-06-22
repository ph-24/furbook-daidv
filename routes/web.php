<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // C1
   //return view('cats/show')->with('number', 10);

    // C2
    $number = 10;
    //return view('cats/show', compact('number'));

    // C3
    //return view('cats/show', array('number'=> 10));

    return redirect('cats');
});

// List cats
Route::get('/cats', function () {
    //return view('cats/index')->with('cats', '<h1>title</h1>');
    echo 'List cats';
});

// Display list cats of breed name
Route::get('/cats/breeds/{name}', function ($name) {
    echo $name;
});

// Create cat
Route::get('/cats/create', function () {
    return view('cats.create');
});

Route::post('/cats', function () {
    echo 'Dữ liệu tạo mới đã được gửi lên';
});

// Display info cat
Route::get('/cats/{id}', function ($id) {
    echo sprintf('Cat #' . $id);
});

// Update cat
Route::get('/cats/{id}/edit', function ($id) {
    echo sprintf('Edit Cat #' . $id);
});

Route::put('/cats/{id}', function () {
    echo 'Dữ liệu update đã được gửi lên';
});

// Delete cat
Route::get('/cats/{id}/delete', function ($id) {
    echo sprintf('delete Cat #' . $id);
});

Route::delete('/cats/{id}', function ($id) {
    echo sprintf('delete Cat #' . $id);
});