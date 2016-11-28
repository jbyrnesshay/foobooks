<?php

use Illuminate\Database\Seeder;
use Foobooks\Book;
use Foobooks\Tag;

class BookTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
        	'The Great Gatsby'=> ['novel', 'fiction', 'classic', 'wealth'],
        	'The Bell Jar'=> ['novel', 'fiction', 'classic', 'women'],
        	'I Know Why the Caged Bird Sings'=>['autobiography', 'nonfiction','classic','women']
        	];

        #loop through the above array, creating new pivot for each book to tag, we already included these tags in TagsTableSeeder
        foreach($books as $title => $tags)	{

        	#first get the book from the books database, by querying books database for the title above that matches  
        	$book = Book::where('title', 'like', $title)->first(); 

        	#now loop through each tag for this book we hae fouond, adding the pivot

        	foreach($tags as $tagName) {
        		$tag = Tag::where('name', 'like', $tagName)->first();

        	#connect thiss tag to this book, saving each tag 
        		$book->tags()->save($tag);
        		#this is the method we addded in the book model
        	}



        }
    }
}
