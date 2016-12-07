<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

use Foobooks\Book;
use Foobooks\Author;
use Foobooks\Tag;

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




    public function index(Request $request)
    {

        $user = $request->user();
        // or $user = Auth::user();

        if($user) {
            $books = $user->books()->get();
        }
        else {
            $books = [];
        }
        //$books = Book::all();
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

       /* if(!(\Auth::check())) {
            Session::flash('flash_message', 'You have to be logged in to add a book');
                return redirect('/');

        }*/
        $authors_for_dropdown = Author::authorsForDropdown();
        return view('book.create')->with("authors_for_dropdown", $authors_for_dropdown);
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
         
          $book->purchase_link = $request->purchase_link;
          $book->author_id = $request->author_id;
          $book->user_id = $request->user()->id;
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
    public function edit($id = null)
    {
        $book=Book::with('tags')->find($id);
        if(is_null($book)) {
    Session::flash('flash_message', 'Book not found');
    return redirect('/books');
}       
   
    # Organize the authors into an array where the key = author id and value = author name
    $authors_for_dropdown = Author::authorsForDropdown();
    $tags_for_checkbox = Tag::getTagsForCheckboxes();

    #create a simple a rray of just the tag names for tags associaated with this book
    $tags_for_this_book = [];
    foreach($book->tags as $tag){
        $tags_for_this_book[] = $tag->name;
    }

    #results in array like this $tags_for_this_book['novel',  'fiction','classic'];

        return view('book.edit')->with([
            'book'=>$book,
            'authors_for_dropdown'=>$authors_for_dropdown,
            'tags_for_checkbox'=>$tags_for_checkbox,
            'tags_for_this_book' =>$tags_for_this_book,]
    );
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
        $book->author_id = $request->author_id;
         
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $book->tags()->sync($tags);
        $book->save();
        //this could be $tags = ($request->tags) ?: [];

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

    public function delete($id) {

        $book = Book::find($id);
        return view('book.delete')->with('book', $book);
    }
    public function destroy($id)
    {  
        $book=Book::find($id);
        if(is_null($book)) {
            Session:flash('message', 'Book not found');
            return redirect('/books');
        }

        if($book->tags()){
            $book->tags()->detach();
        }
        
        $book->delete();
        #DB::table('users')->delete();

        #DB::table('users')->where('votes', '>', 100)->delete();
        Session::flash('flash_message', 'your book was deleted');
        return redirect('/books');

    }
}
