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

    <!--
    <form id="user-login" method="post" action="<?php //echo $thisfile?>">
        <h3 align='center'>Gebruikers login</h3>
        <p>E-mail: <input type="text" name="email" required></p>
        <p>Wachtwoord: <input type="password" name="wachtwoord" required></p>
        <p><input type="submit" value="Inloggen"></p>
        <p><a href="create_account.php">Account aanmaken</a></p>
        <p><a href="reset_password.php">Wachtwoord vergeten?</a></p>        
    </form> -->
    
    @section('kop')
    <div id="kop">
        <h1>Welkom op mijn blog!</h1>
    </div>
    @endsection

    @section('linkerkolom')
    <div id="linkerkolom">
        <?php /*
        echo $categoriekeuzemenu;
        echo $inlog_button;
        echo $uitlog_button;
        echo $maanden; */
       // echo HTML::link('backend.blade.php', 'Naar administratie aan de achterkant');
        $link_naar_secties = "<h3><a href='backend'>Naar administratie aan de achterkant</a></h3>";
        echo $link_naar_secties;
        ?> 
        
    </div>
    @endsection

    @section('rechterkolom')
    <div id="rechterkolom">
        @foreach ($blogs as $blog)
            <h4>{{ $blog->titel }}</h4>
            <p>Datum publicatie: {{ $blog->created_at }}</p>
            <p>{!! $blog->artikel !!}</p>            
        @endforeach
    </div>
    @endsection

    <!-- <script type="text/javascript" src="{{ URL::asset('js/CMSfrontend_002.js') }}"></script> -->
 
  </body>
</html>
