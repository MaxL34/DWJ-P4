<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" />
        <script src="public/js/tinymce/tinymce.min" type="text/javascript">// <![CDATA[/tiny_mce/tiny_mce.js">// ]]></script>
        <script type="text/javascript">// <![CDATA[
            tinyMCE.init({
	            mode : "textareas",
	            language : "fr",
	            theme : "simple"
            });// ]]></script> 
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
        
        <?php echo $_SESSION['user']; ?>

        <form action="../../main_index.php?action=addArticle" method="post">
            <textarea style="width: 60%;" name="title"></textarea></br>
            <textarea style="width: 100%;" name="content"></textarea></br>
            <input name="art_send" type="submit" value="Envoyer" />
        </form>
    </body>
</html>