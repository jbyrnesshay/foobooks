<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

use App;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mysqli = new \mysqli("localhost", "root",NULL, "foobooks");
        if ($mysqli->connect_errno) {
        echo 'Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ' . $mysqli->connect_error; }
      $array= [];
       # $books = $mysqli->query("SELECT * FROM books");
        #$books->data_seek(0);
        #while($book = $books->fetch_array()) {
           
          
         #       $array [] =  [$book];
      #}
     $array = \DB::select('select * from books');
    
         
           return view('book.index')->with('array', $array);
        //echo $book['title']." was written by ".$book['author']."<br>";
        #}
    
}
 


# Step 3) Loop through results
 
        //return App::environment();
#return view('book.index');
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
        //$view = '<form method="POST" action="/books/create">';
        //$view .= csrf_field();
        //$view .= '<label>Title: <input type="text" name="title"></label>';
        //$view .= '<input type="submit">';
        //$view .= '</form>';
        //return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       # $this->validate($request, ['title'=> 'required|min:3',]);

        #$title=$request->input('title');
        \DB::insert('insert into books (title, author, published, cover, purchase_link, tags) values (?, ?, ?, ?, ?, ?)', array('the bad guys', 'cool guy', '1970', 'http://www.google.com', 'http://www.google.com', ''));


        #code goes here to add the book to the databse

        //return 'process adding new book:  '.title_case($title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('book.show')->with('title', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book.edit')->with('title', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
