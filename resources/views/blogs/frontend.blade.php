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
    <form action="{{ route('search') }}" method="post" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search    products"> 
            <span class="glyphicon glyphicon-search"></span>
                <button type="submit" class="btn-btn-primary">Submit</button>
            </span>
        </div>
    </form>
    <div class="categorie">
        <a href="/">All Categories</a><br>
              
              @foreach ($cat_link as $link)
                  
                 <a href="/{{$link->cat_id}}">{{$link->category_name}}</a><br>
                 
              @endforeach
              
        <br />
        <h4><a href='/backend'>to Backend</a></h4> 
        <?php /*
        echo $inlog_button;
        echo $uitlog_button;
        echo $maanden; */
        ?> 
        <!-- <h4><a href='backend'>Naar administratie aan de achterkant</a></h4> -->
    </div>
    @endsection

    @section('rechterkolom')
    
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
            
    @endsection

    <script type="text/javascript" src="{{ URL::asset('js/CMSfrontend_002.js') }}"></script>
 
  </body>
</html>