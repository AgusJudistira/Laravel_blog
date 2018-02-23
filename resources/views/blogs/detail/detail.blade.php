@extends('layouts.master')

<!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
      <meta charset="UTF-8">
      <title>CMS Backend</title>
      <link rel="stylesheet" type="text/css" href="CMSbackend_002.css" />
      <link rel="stylesheet" type="text/css" href="wysiwyg-editor.css" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    @section('kop')
        <div id="kop">
            <h1>Blog details</h1>
        </div>
    @endsectio
    
    @section('linkerkolom')
        <div id="linkerkolom">        
            <h3><a href="CMSbackend_002.php">Terug naar blog administratie</a></h3>
        </div>
    @endsection

    @section('rechterkolom')
        <div id="rechterkolom">
        

        <table>
        <form id="artikelinvoer" method="post" action="<?php echo $thisfile; ?>" onsubmit="javascript: return verwerkArtikel();">
            <tr><td colspan='2'><h2>Blogtitel: <input id="blogtitel" name="blogtitel" type="text" value="<?php echo $titel; ?>" title="Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;
    Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;
    Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;
    Typ '/mvg' in om 'Met vriendelijke groet' in te voeren" required></h2>
                <tr>                    
                    <td>Datuminvoer: <?php echo $datuminvoer ?></td>
                </tr>
                <tr>
                    <td>Datumupdate: <?php echo $datumupdate ?></td>
                </tr>
        </form>
            <tr><td colspan='2'>
        <!-- Make it content editable attribute true so that we can edit inside the div tag and also enable execCommand to edit content inside it.-->
                <textarea id="editor" rows="5" cols="80" name="artikel" form="artikelinvoer"
        title="Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;
    Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;
    Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;
    Typ '/mvg' in om 'Met vriendelijke groet' in te voeren">
                </textarea>
            </td></tr>
        </table>
        <p>
            <input id="sendButton" name="submit" type="submit" value="Verstuur" form="artikelinvoer">
        </p>
        
        <div class="codeoutput">
            <p class="htmloutput">
            </p>
        </div>
    @endsection
    
    <!--
      <textarea id="editor" rows="5" cols="80" name="artikel" form="artikelinvoer"
      title="Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;
Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;
Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;
Typ '/mvg' in om 'Met vriendelijke groet' in te voeren">

</textarea>

</div> -->

    <script src="CMSbackend_002.js"></script>
    <script src="wysiwyg-editor.js"></script>
  </body>
</html>
