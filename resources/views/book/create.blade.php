@extends('layouts.master')

@section('title')
    create a book
@endsection

@section('head')
    <link href='css/books/create.css' type="text/css" rel='stylesheet'>
@endsection

@section('content')
     <form method='POST' action='/books'>
          {{ csrf_field()}}
         <input type='text' name='title'>
         <input type='submit' value='Submit'>
    </form>
    @if(count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
@endsection

@section('body')
    <script src="/js/create.js"></script>
@endsection
