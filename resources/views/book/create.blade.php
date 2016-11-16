@extends('layouts.master')

@section('title')
    create a book
@endsection

@section('head')
    <link href='css/books/create.css' type="text/css" rel='stylesheet'>
@endsection

@section('content')
    <p> hello there </p>
     <form method='POST' action='/books'>
          {{ csrf_field()}}

          <div class = 'form-group'>
          <label>Title:</label>
         <input type='text' id = 'title' name='title' value = "{{ old ('title', 'green eggs and ham') }}">
         </div>
         
         <div class = "form-group">
            <label>Published:</label>
            <input type='text' id='published' name='published' value="{{old ('published', '1960')}}">
         </div> 
         
         <div class = "form-group">
         <label>Cover:</label>
         <input type="url" id = 'cover' name="cover"  value="{{ old ('cover', 'http://prodimage.images-bn.com/pimages/9780394800165_p0_v4_s192x300.jpg') }}">
         </div>
         
         <div class = "form-group">
         <label>Purchase Link:</label>
         <input
               type='text'
               id='purchase_link'
               name='purchase_link'
               value="{{ old('purchase_link','http://www.barnesandnoble.com/w/green-eggs-and-ham-dr-seuss/1100170349') }}"
           >
         </div>
         
         <div class = "form-instructions">
             All fields are required
          </div>
         <input type='submit' value='Submit'>
    </form>
    <div class = "error">
    @if(count($errors) > 0)
        Please correct the errors above and try again.
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    </div>
@endsection

@section('body')
    <script src="/js/create.js"></script>
@endsection
