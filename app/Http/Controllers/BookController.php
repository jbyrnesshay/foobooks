<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

use Foobooks\Book;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function tester() {

        return view('form');
    }




    public function index()
    {
        $books = Book::all();
        return view('book.index')->with('books', $books);
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
       $this->validate($request, ['title'=> 'required|min:3', 'published' => 'required|min:4|numeric', 'cover' => 'required|url', 'purchase_link' => 'required|url']);

        #$title=$request->input('title');
       
          $book = new Book();
          $book ->title = $request->title;
          $book->published = $request->published;
          $book->cover = $request->cover;
          $book->author = "dave fraud";
          $book->purchase_link = $request->purchase_link;
          $book->save();
          Session::flash('flash_message', 'your book was added');
          return redirect('/books');

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
        $book = Book::find($id);
        if(is_null($book)) {
    Session::flash('flash_message', 'Book not found');
    return redirect('/books');
}
        return view('book.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        if(is_null($book)) {
    Session::flash('flash_message', 'Book not found');
    return redirect('/books');
}
        return view('book.edit')->with('book', $book);
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
        $book=Book::find($request->id);
        $book->title = $request->title;
        $book->cover = $request->cover;
        $book->published = $request->published;
        $book->purchase_link = $request->purchase_link;
        $book->save();
        Session::flash('flash_message', 'your changes were saved');
        #return redirect('/books/'.$request->id.'/edit');
        return redirect('/books');
        }

    /**
     * Remove the specified resource from storage.''
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $book=Book::find($id);

        
        $book->delete();
        #DB::table('users')->delete();

        #DB::table('users')->where('votes', '>', 100)->delete();
        Session::flash('flash_message', 'your book was deleted');
        return redirect('/books');

    }
}
