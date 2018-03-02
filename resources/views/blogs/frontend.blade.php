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
    @endsection

    @section('linkerkolom')
        
        <a class="cat-head" href="/">All Categories</a><br>
              
            @foreach ($cat_link as $link)
                
               <a class="cat-body" href="/show_sort_cat/{{$link->cat_id}}">{{$link->category_name}}</a><br>
               
            @endforeach
        
                <h2><a class="backend" href='backend'>to Backend</a></h2>        
    @endsection

    @section('rechterkolom')
    
    @foreach ( $blogs_withcats as $blog )
        <h4>{{ $blog->titel }}</h4>
        <p>Datum publicatie: {{ $blog->created_at }} - Categorieen: @foreach($blog->categories as $category){{ $category->category_name }} @endforeach</p>
        <p>{!! $blog->artikel !!}</p>
        <hr />
     @endforeach
        
        <div ="comments">
            @foreach($blog->comments as $comment)
                <article>

                        {{$comment-body}}

                </article>
        </div>
            @endforeach
    @endsection

    <!-- <script type="text/javascript" src="{{ URL::asset('js/CMSfrontend_002.js') }}"></script> -->
 
  </body>
</html>