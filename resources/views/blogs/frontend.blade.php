
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
    
    <?php $thisfile = $_SERVER['PHP_SELF']; ?>
    
    <form method="POST" action="/blogs">
    {{csrf_field()}}
        <div class="form-title">
            <label for="title">Title</label>
            <input id="title" type="text" class="form-control" name="title">
        </div>
        <div class="form-body">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

    <!-- <form id="user-login" method="post" action="<?php echo $thisfile?>">
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
        Linkerkolom
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
        Rechterkolom
    </div>
    @endsection

    <!-- <script type="text/javascript" src="{{ URL::asset('js/CMSfrontend_002.js') }}"></script> -->
 
  </body>
</html>
