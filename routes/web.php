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

Route::get('/', function () {
    return view('cats/index')->with('cats', '<h1>title</h1>');
});
