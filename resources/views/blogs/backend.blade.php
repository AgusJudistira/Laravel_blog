@extends('layouts.master')

<!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="UTF-8">
    <title>CMS Backend</title>
    <link rel="stylesheet" type="text/css" href="/css/backend.css" />
    <link rel="stylesheet" type="text/css" href="wysiwyg-editor.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
  
    @section('kop')
        <h1>Backend</h1>
    @endsection

    @section('linkerkolom')
          
      @if (Auth::guard('admin')->check())
          <p><b>
            @component('components.who')            
            @endcomponent          
          <br>                
      @endif
      
      <p><a href='/create_cat'>Add categories</a></p>
      <br>
      <p><a href='/'>to Frontend</a></p>
    @endsection

    @section('rechterkolom')
      @include('layouts.errors')

      @include('blogs.posts.invoer')

      <h4>U kunt ook een van de onderstaande blogs wijzigen door op de titel te klikken</h4>
      <hr>

      @foreach ($blogs_withcats as $blog)
          <h4><a href='/edit/{{ $blog->id }}'>{{ $blog->titel }}</a></h4>
      
          <p>Datum publicatie: {{ $blog->created_at }} - Categorieen: 
          @foreach($blog->categories as $category)
            &lt;{{ $category->category_name }}&gt;
          @endforeach</p>
          <p id="artikel">{!! $blog->artikel !!}</p>
          <p>[ <a href='/edit/{{ $blog->id }}'>Wijzigen</a> ]</p>
          <hr />
      @endforeach
    @endsection

    <div id="hidden-h2" style="display: none"> 
    <h2>nodig</h2>
    </div>
    <div id="comment-checkbox">
    </div>

    <!--
    <script src="CMSbackend_002.js"></script>
    <script src="wysiwyg-editor.js"></script> -->
  </body>
</html>