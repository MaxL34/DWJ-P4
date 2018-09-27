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
        <script type="text/javascript" src="/tests/Openclassrooms/DWJ-P4/public/js/tinymce/default_editor.js"></script>
        <link rel="stylesheet" href="/tests/Openclassrooms/DWJ-P4/public/css/main.css" />
    </head>

    <body>
            <ul class="main_menu">
                <li>
                    <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
                </li>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a></li>';
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a></li>';
                        } else {
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a></li>';
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></li>';  
                        }
                    ?>
            </ul>
            
            <div class="container">
                <div class="article">
                    <p>
                        <?php echo $article->art_title(); ?></br>
                        <?php echo $article->art_content(); ?></br>
                        Publié le <?php echo $article->date_fr(); ?></br>
                        Par : <?php echo $article->art_author(); ?>
                    </p>
                </div>
            </div>

        <form class="article_form" action="./main_index.php?action=updateArticle&amp;article_id=<?php echo $_GET['article_id']; ?>" method="post">
            <textarea class="content" style="width: 60%;" name="title">
                <?php echo $article->art_title(); ?>
            </textarea></br>
            <textarea class="content" style="width: 60%;" name="content">
                <?php echo $article->art_content(); ?> 
            </textarea></br>
            <input name="art_send" type="submit" value="Envoyer" />
        </form>
    </body>
</html>