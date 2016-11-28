<?php

namespace Foobooks;
 

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function books() {

    	return $this->belongsToMany('Foobooks\Book')->withTimeStamps();
    }

    public static function getTagsForCheckboxes() {
    	$tags = Tag::orderBy('name','ASC')->get();

    	$tagsForCheckboxes = [];

    	foreach($tags as $tag) {
    		$tagsForCheckboxes[$tag['id']] = $tag->name;
    	}
    	return $tagsForCheckboxes;


    }
}
