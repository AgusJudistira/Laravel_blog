<form id="artikelinvoer" method="POST" action="/posts/invoer">
    {{ csrf_field() }}
    <h4>Voer hier een nieuwe blog in:</h4>
    <p>Titel: <input name='titel' type='text' value=''></p>
    <textarea row="3" cols="40" name="artikel" title="">

    </textarea>
    <p>
        <input id='sendButton' name='submit' type='submit' value='Blog invoeren' form='artikelinvoer'>
    </p>
 </form>   

<?php
    
    // $editor = "</form>";
    // $editor .= "<div id='editor' contenteditable='true' spellcheck='false' title=\"Typ '/cg' in om 'Code Gorilla' in te voeren&#013;&#010;";
    // $editor .= "Typ '/ag' in om 'Agus Judistira' in te voeren&#013;&#010;";
    // $editor .= "Typ '/nl' in om 'Nederland' in te voeren&#013;&#010;";
    // $editor .= "Typ '/mvg' in om 'Met vriendelijke groet' in te voeren\">";
    // $editor .= "<p><br />Voer hier een nieuwe blog in...<br /><br /></p>";
    // $editor .= "</div>";
    // $editor .= "<input id='hidden' type='hidden' name='artikel' value='$artikel' form='artikelinvoer'>";
    // $editor .= "<div>";
    // $editor .= "<p><input type='radio' name='commentaar_toegestaan' value='1' checked='checked' form='artikelinvoer'>Commentaar toegestaan</input></p>";
    // $editor .= "<p><input type='radio' name='commentaar_toegestaan' value='0' form='artikelinvoer'>Commentaar uitgeschakeld</input></p>";
    // $editor .= "</div>";
    // $editor .= "<div style='display: inline-flex'>";
    // $editor .= "<input id='sendButton' name='submit' type='submit' value='Blog invoeren' form='artikelinvoer'>";
    // $editor .= "</div>";  
    // echo $editor;
?>
