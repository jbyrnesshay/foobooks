
@extends('layouts.master')

@section('title')
    Foobooks index page
@stop


@section('head')
    <link href="/css/books/index.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
 

 
 
  <?php	foreach ($array as $book) {

  	#	echo 'the book '.$book[0]['title'].' was written by '.$book[0]['author'].'<br><br>';
  	echo $book->title.' was written by '.$book->author.'<br><br>';
  	}
  	?>
@stop



@section('body')
    <script src="/js/books/index.js"></script>
 