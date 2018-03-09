@extends ('layouts.master')

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
        <h1>Welkom to my blog!</h1>
        
        <form id='frontend-zoekform' method='post' action="/zoeken">
            
            {{ csrf_field() }} 
            <b>Artikels opzoeken: </b><input id='zoekstring' name='zoekstring' type='text' size='40'></input>
            <input type='submit' value='Opzoeken'>
        </form><br />      
        
    @endsection

    @section('linkerkolom')
        <div class="categorie">
            <a href="/">All Categories</a><br>
                
                @foreach ($cat_link as $link)
                    
                    <a href="/{{$link->cat_id}}">{{$link->category_name}}</a><br>
                    
                @endforeach
                
            <br />
                            
            
            @component('components.who')            
            @endcomponent
            
            <p><a href='/register'>Account aanmaken</p>
            <!-- <h4><a href='/admin/login'>to Backend</a></h4> -->
            <h4><a href='/backend'>to Backend</a></h4>
            
        </div>
    @endsection

    @section('rechterkolom')
        @if (count($blogs_withcats) > 0)
            @foreach ( $blogs_withcats as $blog )
                <h4><a href='/fullblog/{{ $blog->id }}'>{{ $blog->titel }}</a></h4>
                <p>Datum publicatie: {{ $blog->created_at }} - Categorieen: 
                    @foreach($blog->categories as $category)
                        &lt;{{ $category->category_name }}&gt;
                    @endforeach</p>            
                <p id="artikel">{!! $blog->artikel !!}</p>
                <p><a href='/fullblog/{{ $blog->id }}'>Lees meer &gt;&gt;</a></p>
                <hr />
            @endforeach
        @endif
    @endsection

    <script type="text/javascript" src="{{ URL::asset('js/CMSfrontend_002.js') }}"></script>

  </body>
</html>