<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

use DB;
use Carbon;
use Foobooks\Book;


class PracticeController extends Controller
{
    //
    public function example50() {
        $books = Book::all();
        dump($books->toArray());
    }

    public function example51() {
        $collection = collect([
                ['name' => 'Desk', 'price' => 200],
            ['name' => 'Chair', 'price' => 100],
            ['name' => 'Bookcase', 'price' => 150],
        ]);

        $sorted = $collection->sortBy('price');

        $sorted->values();
        $sorted->all();

        //..$collection = collect([['name' => 'Desk', 'price' => 100], ['name' => 'BadUniversity', 'price' => 'costly']]);
        //$fat = $collection->pluck('price', 'name');
        
        //$collection->pop();
        dump($sorted);
        //echo $collection->contains('Desk');

        // true

        //echo $collection->has('name');

        // false
     
    }

    public function example4() {
         $books = DB::table('books')->where('author', 'LIKE', '%fitzgerald%')->get();

         #output
         foreach ($books as $book) {
            echo $book->title.'<br>';
         }
    }

    public function example1() {
         DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title'=> 'Fake Title',
            'author' => 'Fake Author',
            'published' => '1899',
            'cover' => 'http stuff',
            'purchase_link' => 'more http stuff',

         ]);//end new addition
    }

    public function example2() {
         #instantiate a new Book Model object
        $book = new Book();

        #set the parameters
        #each param corresponds to a field in the table
        $book->title = 'Hotpot Barry';
        $book->author = 'O.K. Bowling';
        $book->published = 1852;
        $book->cover = 'click to get it';
        $book->purchase_link = 'click again';

        #invoke the Eloquent save() method
        #this will generat a new row in the ''books' table with the above data
        $book->save();
        echo 'Added: '.$book->title;
    }

    public function example5() {
        $books = Book::all();

        if(!$books->isEmpty()) {
            #output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'no books found';
        }
        
    }


    public function example7() {
        $books = Book::where('author', 'LIKE', '%Scott%')->get();

        if($books) {
            foreach ($books as $book) {
            echo $book->title.'<br>';

        }}
        else {
            return 'Book not found';
        }
    }

    public function example10() {
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if($book) {

            $book->title = 'The Wrongest Gang';

            $book ->save();
            echo "update complete; check the databaswe to see if your update worked....";
        }
        else {
            echo 'book not found, cant update';
        }
    }

    public function Example15() {
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if($book) {
            $book->delete();
            return "deletion complete; check the databse to see if it worked ...";

        }
        else {
            return "can't delete - book not found";
        }

    }

    public function Example16() {
        $book = new Book();
        $test = $book->where('author', 'LIKE', '%Plath%')->first();
        echo $test->title;
    }

    public function Example17() {
        $books = new Book();
        $tests = $books->where('published','<=', 1900)->get();
        foreach ($tests as $book) {
            echo $book->title.'<br>';
        }
    }
    public function Example18() {
        $books = Book::latest()->take(5)->get();  
        foreach ($books as $book) {
            echo $book->title.'<br>';
        }
    }

    public function Example19() {
        $books = Book::orderBy('published', 'desc')->get();
        foreach ($books as $book) {
            echo $book->title.$book->published.'<br>';
        }
    }
    public function Example21() {
        $books = Book::where('author', 'LIKE', '%plath%')->get();
        if ($books) {
            foreach($books as $book) {

                 $book->delete();
            }
            return "check";
        }
        else return "no books?";
    }

    public function Example25() {
        $books= Book::where('author', 'Like', '%Maya%')->get();
        if ($books) {
            foreach($books as $book) {
                $book->author = 'gaya angelou';
                $book->save();
            }
            
        }
        else return "no books?";
         
    }
    public function Example26() {
        echo App\Book::where('author', 'LIKE', '%gaya%')->first();
         
           // echo $book->title;
         
    }

    public function Example30() {
        Book::where('author', 'LIKE', '%gaya%')->delete();
    }
    public function Example31() {
        $books = Book::all();
        //dump($books);
        //echo $books;
        foreach($books as $book) {
            echo $book->title;
        }
    }
}
