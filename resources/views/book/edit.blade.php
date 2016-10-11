@extends('layouts.master')

@section('title')
    edit a book
@stop

@section('head')
    <link href="/css/edit.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <p>this is a page where you edit the book {{ $title }}</p>
    <p>add appropiate content here</p>
@stop


@section('body')
    <script src="/js/edit.js"></script>
