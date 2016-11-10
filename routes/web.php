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


# View all books
Route::get('/books', 'BookController@index')->name('books.index');

# Display form to add a new book
Route::get('/books/create', 'BookController@create')->name('books.create');

Route::get('/books/upload', 'BookController@tester')->name('books.upload');

# Process form to add a new book
Route::post('/books', 'BookController@store')->name('books.store');

#Display an individual book
Route::get('/books/{title}', 'BookController@show')->name('books.show');

#Display form to edit an individual book
Route::get('/books/{title}/edit', 'BookController@edit')->name('books.edit');
#process form to save edits to an individual book

Route::put('/books/{title}', 'BookController@update')->name('books.update');

#Delete an individual book
Route::delete('/books/{title}', 'BookController@destroy')->name('books.destroy');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/help', 'PageController@help')->name('help');

Route::get('/', function () {
    return view('welcome');
});

#make it so the logs can be seen only locally
if(App::environment() == 'local') {
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

#drop add foobooks database practice route
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};


# various practice routes
Route::get('/debugbar', function() {
    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out...');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';
});

Route::get('/test', function() {
        $camel = "funny people";
        $teststring = config('mail.driver');
        echo $teststring;
        //echo e('<html>foontime</html>');
        //return $camel;
        //echo e($teststring);
});

Route::get('/practice', 'PracticeController@index')->name('practice.index');
for ($i=0; $i<100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}

//Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/random', function() {

    $random = new Randomizer();
    return $random->getRandomString(10);
});

Route::get('/example', function() {
    return App::environment();
});

#test this and then remove
/*Route::post('/books/create', function() {
    dd(Request::all());
});*/

#check mysql connection
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});