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
        <h1>Blog administratie - Categorie toevoegen</h1>
    @endsection

    @section('linkerkolom')
        <h4><a href='/backend'>Terug naar Blog administratie</a></h4>            
    @endsection

    @section('rechterkolom')

    @foreach ($categories as $category)            
        <p>{{ $category->cat_id }} - {{ $category->category_name }}</p>
        <hr />
    @endforeach

    <form id="categorieinvoer" method="post" action="/create_cat">
        {{ csrf_field() }}
        Nieuwe categorie: <input id="categorie" name="categorie" type="text" value="" required>
        <input id="sendButton" name="submit" type="submit" value="Toevoegen" form="categorieinvoer">
    </form>
    
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
