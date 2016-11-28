<?php

namespace Foobooks;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author() {
    	#book belongs to author
    	#define an inverse oneto many relatinoship
    	return $this->belongsTo('Foobooks\Author');
    }

    public function tags() {
    	return $this->belongsToMany('Foobooks\Tag')->withTimestamps();
    }
}
