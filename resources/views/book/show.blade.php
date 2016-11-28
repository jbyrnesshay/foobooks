 @extends('layouts.master')

 @section('title')
    Show book
 @stop

 {{--
This 'head' section will be yielded right before the closing </head> tag
Use it to add specific things that *this* View needs in the <head>
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    {{--@include('view.edit')--}}

 
     {{ $book->title}}<br>
     {{ $book->author->first_name." ".$book->author->last_name}}<br>
     {{ $book->published}}<br>
     {{ $book->cover}}<br>
     {{ $book->purchase_link}}<br>
     

  

@stop

{{--
This 'body' section will be yielded right before the closing </body> tag
Use it to add specific things that *this* View needs at the end of the <body>
such as a page specific Javascript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@stop
