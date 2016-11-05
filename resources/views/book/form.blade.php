@extends(layouts.master)

@section('title')
  upload practice
@endsection

@section('head')
@endsection

@section('content')
<form action="{{ url('handle-form') }}"
	method="POST"
	enctype="multipart/form-data">

	{{ csrf_field() }}

	<input type="file" name="book" />
	<input type="submit">
</form>


@endsection
