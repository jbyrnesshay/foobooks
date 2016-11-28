@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $book->title }}
@endsection

@section('content')

	<form method='POST' action='/books/{{ $book->id}}'>

		{{ method_field('DELETE')}}
		{{ csrf_field()}}


		<h2> are you sure you want to delete  <em>{{$book->title}}</em>?</h2>

		<input type='submit' value='yes'>
	</form>
@endsection