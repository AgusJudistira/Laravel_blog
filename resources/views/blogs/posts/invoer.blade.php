<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add blog</title>
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
    </script>
</head>
<body>
    <form id="artikelinvoer" method="POST" action="/backend">

    {{ csrf_field() }} 
    <h4>Voer hier een nieuwe blog in:</h4>
    <hr> 
    <h3>Titel: <input name='titel' type='text' value='' size='50'></h3>  Categorie: 
    <select name='cat_id' form='artikelinvoer'>
        @foreach ($categories as $category)
            <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
    </p>

    <textarea row="3" cols="60" name="artikel" title=""></textarea>
    <hr>
    <p><input type='radio' name='commentaar_toegestaan' value='1' checked='checked' form='artikelinvoer'>Commentaar toegestaan</input></p>
    <p><input type='radio' name='commentaar_toegestaan' value='0' form='artikelinvoer'>Commentaar uitgeschakeld</input></p>
    
    <p><input id='sendButton' name='submit' type='submit' value='Blog invoeren' form='artikelinvoer'></p>
    <hr>
 </form>   

</body>
</html>

<?php
    

?>
