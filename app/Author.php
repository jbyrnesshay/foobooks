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
}
