<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Création d\'un billet'; ?>
<?php $tinyMCE_API = 'src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0ofr5ymckej6ac4mcq2doqoozjut2zifnyjjfp067bqy5s12"'; ?>
<?php $tinyMCE_DefaultEditor = 'src="./js/tinymce/default_editor.js"'; ?>
<?php $tinymceInit = 'tinymce.init({ selector: \'content\' })'; ?>

<?php ob_start(); ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet Simple pour l'Alaska</h1>
                    <span class="subheading">Page de rédaction d'article<span>
                </div>
                </div>
            </div>
            </div>
</header>

    <div class="article_creation_container">                
        <h1>Rédaction d'un nouveau billet</h1>
            <form class="article_form" action="./index.php?action=addArticle" method="post">
                <p>Titre du billet :</p>
                    <textarea class="content" id="art_title" name="title"></textarea></br>
                <p>Contenu du billet :</p>
                    <textarea class="content" id="art_content" name="content"></textarea></br>
                <input id="art_submit_btn" name="art_send" type="submit" value="Envoyer" />
            </form>
    </div>

<div id="modal_create" class="modal">
    <div class="modal_content">
        <p id="modal_text"></p>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('./views/layout.php')) {
        require('./views/layout.php');
    }
?>