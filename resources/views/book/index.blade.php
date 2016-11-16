
@extends('layouts.master')

@section('title')
    Foobooks index page
@stop


@section('head')
    <link href="/css/foobooks.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
 

  <div class = "book">
    @foreach ($books as $book)

    	<div class="show">
    		<a href="/books/{{$book->id}}">show</a>
    	</div>
    	<div class="edit">
    		<a href="/books/{{$book->id}}/edit">edit</a>
    	</div>

    	
        <h2>{{$book->title}}</h2>
        <br>
    @endforeach
  </div>
   
@stop



@section('body')
    <script src="/js/books/index.js"></script>
 