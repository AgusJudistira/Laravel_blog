@extends('layouts.master')

<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
        <title>CMS Backend</title>
        <link rel="stylesheet" type="text/css" href="/css/backend.css" />
        <link rel="stylesheet" type="text/css" href="/css/blogedit.css" />
        <link rel="stylesheet" type="text/css" href="wysiwyg-editor.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        
        @section('kop')
            <h1>Blog wijzigen</h1>        
        @endsection
        
        @section('linkerkolom')
            <h4><a href="/backend">Terug naar overzicht</a></h4>
        @endsection
        
        @section('rechterkolom')
            
            <form id="artikelinvoer" method="post">
                {{ csrf_field() }} 
                <p>
                    <h3>Titel: <input id="blogtitel" form="artikelinvoer" name="titel" type="text" value="{{ $blog->titel }}" title="Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;
        Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;
        Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;
        Typ '/mvg' in om 'Met vriendelijke groet' in te voeren" required>
                    </h3>  Categorie: 
                        <select name='cat_id' form='artikelinvoer'>
                        @foreach ($categories as $category)
                            <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
                        @endforeach
                        </select>
                </p>

                <p>                    
                    Datuminvoer: {{ $blog->created_at }} - Datumupdate: {{ $blog->updated_at }}
                </p>
            
                <p>
                    <td colspan='2'>
            <!-- Make it content editable attribute true so that we can edit inside the div tag and also enable execCommand to edit content inside it.-->
                    <textarea id="editor" rows="5" cols="80" name="artikel" form="artikelinvoer"
            title="Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;
        Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;
        Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;
        Typ '/mvg' in om 'Met vriendelijke groet' in te voeren">
{{ $blog->artikel }}
                    </textarea>
                    </td>
                </p>
            </form>

            <p>
                <input id="sendButton" name="submit" type="submit" value="Wijziging opslaan" form="artikelinvoer">
            </p>
        
            <div class="codeoutput">
                <p class="htmloutput">
                </p>
            </div>
            <hr>
            <h4>Commentaren:</h4>
            <hr>
            @foreach($list_of_comments as $comment)
                <p class="commentaar">Door &lt;anoniem&gt;: {{ $comment->comment }} - {{ $comment->created_at }} [ <a href="/edit/{{ $blog->id }}/{{ $comment->id }}">VERWIJDEREN</a> ]</p>
            @endforeach

        @endsection
<!--
    
    {{-- var_dump($comment) --}}
        <script src="CMSbackend_002.js"></script>
        <script src="wysiwyg-editor.js"></script>
-->
    </body>
</html>
