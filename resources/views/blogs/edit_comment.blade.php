@extends('layouts.master')

<!DOCTYPE html>
<html>
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
            <h1>Commentaar wijzigen</h1>        
        @endsection
        
        @section('linkerkolom')
            <h3><a href="/backend">Terug naar blog administratie</a></h3>
        @endsection
        
        @section('rechterkolom')
            <form id='commentaarinvoer' method='post'>
                {{ csrf_field() }}
                <h4>Commentaar wijzigen</h4>
                
                <textarea id='commentaar' rows='5' cols='80' name='commentaar'>
{{ $commentaar }}</textarea><br />
                <input id='sendButton' name='submit' type='submit' value='Verstuur'>
                <input id='sendButton' name='delete' type='submit' value='VERWIJDEREN'>
            </form>
        @endsection

    </body>
</html>