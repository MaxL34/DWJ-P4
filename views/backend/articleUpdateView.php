<?php $title = 'Blog de Jean Forteroche : Espace d\'édition des billets'; ?>

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
            <textarea class="content" style="width: 60%;" name="title">
                <?php echo $article->art_title(); ?>
            </textarea></br>
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