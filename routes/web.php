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

    return redirect('cats');
});

// List cats
Route::get('/cats', function () {
    $cats = Furbook\Cat::all();
    //dd($cats[0]->breed);
    return view('cats/index')->with('cats', $cats);
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

// Display info cat
Route::get('/cats/{id}', function (Furbook\Cat $id) {
    //dd(DB::getQueryLog());
    $cat = Furbook\Cat::find($id)->first();
    return view('cats.show')->with('cat', $cat);
})->where('id', '[0-9]+');

// Create cat
Route::get('/cats/create', function () {
    return view('cats.create');
});

Route::post('/cats', function () {
    //dd(Request::all());
    $cat = Furbook\Cat::create(Input::all());
    return redirect('cats/' . $cat->id)->with('cat', $cat)
        ->withSuccess('Create cat success');
});

// Update cat
Route::get('/cats/{id}/edit', function ($id) {
    $cat = Furbook\Cat::find($id);
    return view('cats.edit')->with('cat', $cat);
});

Route::put('/cats/{id}', function ($id) {
    $cat = Furbook\Cat::find($id);
    $cat->update(Input::all());
    return redirect('cats/'. $cat->id)
        ->withSuccess('Update cat success');
});

// Delete cat
Route::get('/cats/{id}/delete', function ($id) {
    $cat = Furbook\Cat::find($id);
    $cat->delete();
    return redirect('cats')
        ->withSuccess('Delete cat success');
});

Route::delete('/cats', function () {
    $id = Input::post('id');
    $cat = Furbook\Cat::find($id);
    $cat->delete();
    return redirect('cats')
        ->withSuccess('Delete cat success');
});