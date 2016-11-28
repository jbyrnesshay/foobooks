@extends('layouts.master')

@section('title')
    create a book
@endsection

@section('head')
    <link href='css/books/create.css' type="text/css" rel='stylesheet'>
@endsection

@section('content')
    <p> hello there </p>
    <form method='POST' action='/books/{id}'>
    {{ method_field('PUT') }}
    {{ csrf_field() }}
          <input type='hidden' name='id' value='{{ $book->id }}'>

          <div class = 'form-group'>
          <label>Title:</label>
         <input type='text' id = 'title' name='title' value = "{{$book->title, old ('title')}}">
         </div>

         <div class ='form-group'>
            <label for = 'author_id'>* Author:</label>
            <select id='author_id' name='author_id'>
              @foreach($authors_for_dropdown as $author_id => $author_name)
                  <option value='{{ $author_id}}' {{($book->author_id == $author_id) ? 'SELECTED' : ''}}>
                      {{$author_name}}
                  </option>
              @endforeach
          </select>
        </div>
         <div class = "form-group">
            <label>Published:</label>
            <input type='text' id='published' name='published' value="{{$book->published, old ('published')}}">
         </div> 
         
         <div class = "form-group">
         <label>Cover:</label>
         <input type="url" id = 'cover' name="cover"  value="{{ $book->cover, old ('cover') }}">
         </div>
         
         <div class = "form-group">
         <label>Purchase Link:</label>
         <input
               type='text'
               id='purchase_link'
               name='purchase_link'
               value="{{$book->purchase_link ,old('purchase_link' )}}"
           >
         </div>

         <div class="form-group">
            @foreach($tags_for_checkbox as $tag_id => $tag_name)
              <input type = 'checkbox' value='{{ $tag_id}}' name='tags[]' {{(in_array($tag_name, $tags_for_this_book)) ? 'CHECKED': '' }}
              >
              
              {{$tag_name}}<br>
            @endforeach
          </div>
         
         <div class = "form-instructions">
             All fields are required
          </div>
         <input type='submit' value='Submit'>
    </form>
     <div class = "delete">
    	<form method='POST' action='/books/{{$book->id}}'>
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
   <label>DELETE?</label>
	<input type='submit' name = "delete" value='Submit'>
 </div>
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
