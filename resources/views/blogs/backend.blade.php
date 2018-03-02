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
        <h1>Blog administratie</h1>
    @endsection

    @section('linkerkolom')
        <h4><a href='/'>Naar de voorkant</a></h4>            
        <h4><a href='/create_cat'>Categorieen toevoegen</a></h4>            
    @endsection

    @section('rechterkolom')
        @include('blogs.posts.invoer')

        <h4>U kunt ook een van de onderstaande blogs wijzigen door op de titel te klikken</h4>
        <hr>

        @foreach ($blogs_withcats as $blog)
            <h4><a href='/edit/{{ $blog->id }}'>{{ $blog->titel }}</a></h4>
        
            <p>Datum publicatie: {{ $blog->created_at }} - Categorieen: @foreach($blog->categories as $category){{ $category->category_name }}  @endforeach</p>
            <p>{!! $blog->artikel !!}</p>
            
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
