
@extends('layouts.master')

@section('title')
    Foobooks index page
@stop


@section('head')
    <link href="/css/book.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <h1> All the books</h1>
    @if(sizeof($books)==0)
        You have not added any books, you can <a href='/book/create'>add a book now to get started</a>.
    @else
        {{--this id and class are new --}}
        <div id= "books" class='cf'>
            @foreach ($books as $book)
                {{--remove class show--}}
            	<section class="book">
            		<a href="/books/{{$book->id}}">
                    <h2 class='truncate'>{{$book->title}}</h2></a>
                    <h3 class='truncate'>{{$book->author->first_name}} {{$book->author->last_name}}</h3>
            	    <img class='cover' src='{{$book->cover}}' alt='Cover for {{ $book->title}}'>
                    <br>
            	 
            		<a href="/books/{{$book->id}}/edit">
                    <i class ='fa fa-pencil'></i>edit</a>
            	   
                   <a href='/books/{{$book->id}}'><i class='fa fa-eye'></i> View</a>

                   <a href='/books/{{$book->id}}/delete'><i class = 'fa fa-trash'></i>Delete</a>
                   </section>

            	
                
            @endforeach
        </div>
      @endif
@stop



@section('body')
    <script src="/js/books/index.js"></script>
 