<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Création d'un article</title>
        <link href="style.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0ofr5ymckej6ac4mcq2doqoozjut2zifnyjjfp067bqy5s12">// <![CDATA[/tiny_mce/tiny_mce.js">// ]]></script>
        <script type="text/javascript">// <![CDATA[
        tinymce.init({
    selector: '.content',
    theme: 'modern',
    width: 600,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
  </script>
        
    </head>

    <body>
        <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
        <?php
            if (isset($_SESSION['id'])) {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a>&nbsp';
                echo '<a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a>';
            } else {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a>&nbsp';
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a>';  
              }
        ?>
        
        <form action="../../main_index.php?action=addArticle" method="post">
            <textarea style="width: 60%;" name="title"></textarea></br>
            <textarea class="content" style="width: 60%;" name="content"></textarea></br>
            <input name="art_send" type="submit" value="Envoyer" />
        </form>
    </body>
</html>