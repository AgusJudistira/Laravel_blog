@extends ('layouts.master')


<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="UTF-8">
    <title>CMS Backend</title>
    <link rel="stylesheet" type="text/css" href="/css/frontend.css" />
</head> 
  <body>
    
    @section('kop')
        <h1>Welkom to my blog!</h1>
    @endsection

    @section('linkerkolom')
        
        <a class="cat-head" href="/">Alle Categories</a><br>
              
            @foreach ($categories as $category)
                
               <a class="cat-body" href="/show_sort_cat/{{$category->cat_id}}">{{$category->category_name}}</a>
                           <hr />
            @endforeach
        
                <a class="backend"href='/backend'>to Backend</a>       
    @endsection

      @section('rechterkolom')
    
    @foreach ( $blogs_withcats as $blog )
        <div>{{ $blog->titel }}</div>
        <div> {{ $blog->created_at }} - Categorieen: @foreach($blog->categories as $category){{ $category->category_name }} @endforeach</div>
        <div>{!! $blog->artikel !!}</div>
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
