<?php

namespace Foobooks;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books() {
    	#author has many books
    	# define a one to many relationship
    	return $this->hasMany('App\Book');
    }
    # app/Author.php
	public static function authorsForDropdown() {

	    $authors = Author::orderBy('last_name', 'ASC')->get();
	    $authors_for_dropdown = [];
	    foreach($authors as $author) {
	        $authors_for_dropdown[$author->id] = $author->last_name.', '.$author->first_name;
	    }

	    return $authors_for_dropdown;
    }
}
