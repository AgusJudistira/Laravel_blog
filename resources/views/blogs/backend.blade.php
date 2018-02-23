<!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="UTF-8">
    <title>CMS Backend</title>
    <link rel="stylesheet" type="text/css" href="/css/backend.css" />
    <link rel="stylesheet" type="text/css" href="wysiwyg-editor.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div id="kop">
      <h1>Blog administratie</h1>
    </div>

    <div id="linkerkolom">
    <?php 
        if (strlen($uitloggen) == 0) {
            $links = "<h3><a href=\"CMSfrontend_002.php\">Naar de voorkant</a></h3>";
        }
        else {
            $links = "<h3><a href=\"CMSbackendcategory_002.php\">Categorie toevoegen</a></h3>";
            $links .= "<h3><a href=\"CMSfrontend_002.php\">Naar de voorkant</a></h3>";
        }
        echo $uitloggen;
        echo $links;
    ?>
    </div>
    <div id="rechterkolom">
    <?php echo $bloglist; ?>
    <?php echo $editor; ?>
    </div>

    <div id="hidden-h2" style="display: none"> 
    <h2>nodig</h2>
    </div>
    <div id="comment-checkbox">
    </div>

    <script src="CMSbackend_002.js"></script>
    <script src="wysiwyg-editor.js"></script>
  </body>
</html>
