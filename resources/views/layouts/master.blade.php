<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Foobooks'--}}
        @yield('title', 'Foobooks')
    </title>
    
    <meta charset='utf-8'>
    
    <!-- Latest compiled and minified CSS -->
<script src="https://use.fontawesome.com/ea0bd51253.js"></script>
<link href="/css/foobooks.css" type='text/css' rel='stylesheet'>
<link href="/css/app.css" rel="stylesheet">
    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
    @yield('head')

</head>
<body>
    <header>
        <img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>

       
    </header>
    <nav>
        <ul>
            @if(Auth::check())
                <li><a href="/"> Home </a></li>
                <li><a href="/books/create"> add a book </a></li>
                <li><a href='/logout'>log out</a></li>
            @else
                <li><a href ="/"> Home</a></li>
                <li><a href="/login">Log in</a></li>
                <li><a href='/register'>Register</a></li>
            @endif

    </ul>
    </nav>
    <section>
   
        @if(Session::get('flash_message') != null)
                 <div id="flash_message">
             
                {{Session::get('flash_message')}}
             </div>
        @endif
   
     
        {{--Main page content will be yielded here--}}
        @yield('content')

    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at end of body--}}
    @yield('body')
</body>
</html>
