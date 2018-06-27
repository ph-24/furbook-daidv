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
use Illuminate\Support\Facades\Input;
DB::enableQueryLog();

Route::get('/', function () {
    // C1
   //return view('cats/show')->with('number', 10);

    // C2
    $number = 10;
    //return view('cats/show', compact('number'));

    // C3
    //return view('cats/show', array('number'=> 10));

    return redirect()->route('cat.index');
});

// Display list cats of breed name
Route::get('/cats/breeds/{name}', function ($name) {
    $breed = Furbook\Breed::with('cats')
        ->where('name', $name)
        ->first();
    //dd($breed->cats);
    return view('cats.index')
        ->with('breed', $breed)
        ->with('cats', $breed->cats);
});

Route::resource('cat', 'CatController');