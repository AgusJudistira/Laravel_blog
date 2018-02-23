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
        <div id="kop">
        <h1>Blog administratie</h1>
        </div>
    @endsection

    @section('linkerkolom')
        <div id="linkerkolom">

        </div>
    @endsection

    @section('rechterkolom')
        <div id="rechterkolom">
            Rechterkolom
            <?php //echo $bloglist; ?>
            <?php //echo $editor; ?>
            @include('blogs.posts.invoer')
        </div>
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
