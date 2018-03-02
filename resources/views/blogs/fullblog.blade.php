@extends('layouts.master')

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
        <title>CMS Frontend</title>
        <link rel="stylesheet" type="text/css" href="/css/frontend.css" />
    </head> 
    <body>

    @section('kop')
        <h1 align="center">{{ $blog->titel }}</h1>
    @endsection

    @section('linkerkolom')
        <h4><a href='/'>Terug naar overzicht</a></h4>                    
    @endsection

    @section('rechterkolom')

        <p>Ingevoerd op: {{ $blog->created_at }} - Bijgewerkt op: {{ $blog->updated_at }}</p>

        <p>Categorieen: @foreach($categories as $cat){{ $cat->category_name }}  @endforeach</p>
        <hr>
        <p>{{ $blog->artikel }}</p>
        <hr>

        <form id='commentaarinvoer' method='post'>
            {{ csrf_field() }}
            <h4>Anoniem commentaar invoeren</h4>
            
            <textarea id='commentaar' rows='5' cols='80' name='commentaar'>
Voer een commentaar in...</textarea><br />
            <input id='sendButton' name='submit' type='submit' value='Verstuur'>
        </form>
        <hr>
        <p><b>Commentaren van lezers:</b></p>
        @foreach($list_of_comments as $comment)
            <p>door &lt;anoniem&gt;: {{ $comment->comment }} - {{ $comment->created_at }}</p>
        @endforeach

    @endsection


    </body>
</html>