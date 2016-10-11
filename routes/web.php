<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#test this and then remove
Route::post('/books/create', function() {
    dd(Request::all());
});




# View all books
Route::get('/books', 'BookController@index')->name('books.index');

# Display form to add a new book
Route::get('/books/create', 'BookController@create')->name('books.create');


# Process form to add a new book
Route::post('/books', 'BookController@store')->name('books.store');

#Display an individual book
Route::get('/books/{book}', 'BookController@show')->name('books.show');

#Display form to edit an individual book
Route::get('/books/{book}/edit', 'BookController@edit')->name('books.edit');
#process form to save edits to an individual book

Route::put('/books/{book}', 'BookController@update')->name('books.update');

#Delete an individual book
Route::delete('/books/{book}', 'BookController@destroy')->name('books.destroy');

Route::get('/contact', 'PageController@contact')->name('contact');


Route::get('/help', 'PageController@help')->name('help');
