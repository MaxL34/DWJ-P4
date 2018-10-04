<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog de Jean Forteroche : Espace d'édition des billets</title>
        <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0ofr5ymckej6ac4mcq2doqoozjut2zifnyjjfp067bqy5s12"></script>
        <script type="text/javascript" src="/tests/Openclassrooms/DWJ-P4/public/js/tinymce/default_editor.js"></script>
    </head>

<?php ob_start(); ?>

            
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
            <p>Titre du billet :</p>
                <textarea class="content" style="width: 60%;" name="title">
                    <?php echo $article->art_title(); ?>
                </textarea></br>
            <p>Contenu du billet :</p>
                <textarea class="content" style="width: 60%;" name="content">
                    <?php echo $article->art_content(); ?> 
                </textarea></br>
                <input name="art_send" type="submit" value="Envoyer" />
        </form>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>