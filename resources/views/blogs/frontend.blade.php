@extends ('layouts.master')


<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="UTF-8">
    <title>CMS Frontend</title>
    <link rel="stylesheet" type="text/css" href="/css/frontend.css" />
    <script src="js\CMSfrontend_002.js"></script>
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
              
        <br>
    </div>
    <!-- <div class="month_review">Monthly review

        @foreach ($cat_link as $link)
                  
            
                  
        @endforeach
    </div> -->
        <h4><a href='/backend'>to Backend</a></h4> 
        <?php /*
        echo $inlog_button;
        echo $uitlog_button;
        echo $maanden; */
        ?> 
        <!-- <h4><a href='backend'>Naar administratie aan de achterkant</a></h4> -->
   
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