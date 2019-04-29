<?php $title = 'Blog de Jean Forteroche : Espace d\'édition des billets' ?>
<?php $tinyMCE_API = 'src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0ofr5ymckej6ac4mcq2doqoozjut2zifnyjjfp067bqy5s12"'; ?>
<?php $tinyMCE_DefaultEditor = 'src="./public/js/tinymce/default_editor.js"'; ?>
<?php $tinymceInit = 'tinymce.init({selector:\'content\'});'; ?>

<?php ob_start(); ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>Billet Simple pour l'Alaska</h1>
                            <span class="subheading">Page de modification d'article<span>
                        </div>
                    </div>
                </div>
            </div>
</header>

            <form class="article_form" action="./index.php?action=updateArticle&amp;article_id=<?php echo $_GET['article_id']; ?>" method="post">
                <p>Titre du billet :</p>
                    <textarea class="content" id="art_title" style="width: 60%;" name="title">
                        <?php echo $article->art_title(); ?>
                    </textarea></br>
                <p>Contenu du billet :</p>
                    <textarea class="content" id="art_content" style="width: 60%;" name="content">
                        <?php echo $article->art_content(); ?> 
                    </textarea></br>
                    <input type="hidden" name="art_id" id="art_id" value="<?php echo $article->art_id(); ?>" />
                    <input id="art_update_btn" name="art_send" type="submit" value="Envoyer" />
            </form>
        </div>

<div id="modal_update" class="modal">
    <div class="modal_content">
        <p id="modal_text"></p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>