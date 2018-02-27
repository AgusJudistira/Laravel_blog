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
        <h1>Welkom op mijn blog!</h1>
    @endsection

    @section('linkerkolom')
        
        <h4><a href="rechtercolom">Alle Categorien</a></h4><br>
              
            @foreach ($categories as $category)
                
               <a href="rechtercolom">{{$category->category_name}}</a>
                           <hr />
            @endforeach
        
                <h2><a href='backend'>Naar administratie aan de achterkant</a></h2>        
    @endsection

    @section('rechterkolom')
    
        @foreach ($blogs as $blog)
            <h4>{{ $blog->titel }}</h4>
            <p>Datum publicatie: {{ $blog->created_at }}</p>
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
