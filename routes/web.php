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
Route::get('/books', function(){
    return 'here are all the books';
})->name('books.index');

# Display form to add a new book
Route::get('/books/create', function() {
    $view = '<form method="POST" action="/books/create">';
    $view .= csrf_field();
    $view .= '<label>Title: <input type="text" name="title"></label>';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;
})->name('books.create');

# Process form to add a new book
Route::post('/books', function() {

})->name('books.store');

#Display an individual book
Route::get('books/{book}', function($book = '') {
        if ($book == '') {
            return 'your request did not include a title.';
        }
        return 'Results for the book: '.$book;

})->name('books.show');

#Display form to edit an individual book
Route::get('/books/{book}/edit', function($book){

})->name('books.edit');

#process form to save edits to an individual book
Route::put('/books/{book}', function($book){

})->name('books.update');

#Delete an individual book
Route::delete('/books/{book}', function($book) {

})->name('books.destroy');


Route::get('/contact', function() {
    return 'contact me here';
});

Route::get('/help', function() {
    return 'get help here';
});
