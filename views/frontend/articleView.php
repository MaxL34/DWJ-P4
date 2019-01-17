<?php $title = 'Blog de Jean Forteroche : Articles'; ?>

<?php ob_start(); ?>
<div class="banner">
    <h1 class="home_title">Billet simple pour l'Alaska</h1>
        <p class="paragraphe">Faites défiler la page vers le bas pour retrouver les différents chapitres de mon roman et laissez vous guider pour lire le chapitre qui vous intéresse</p>

        <a id="chapter_link" href="#container" class="fas fa-arrow-alt-circle-down fa-4x"></a>

</div>

<div id="container">
    <?php
        foreach ($articles as $value) {
    ?>
        <div class="container_article">
            <div class="article">
                    <?php echo $value->art_title(); ?>
                    <?php echo $value->art_content(); ?>
                    Publié le <?php echo $value->date_fr(); ?></br>
                    Par : <?php echo $value->art_author(); ?></br>
                    Modifié le : <?php echo $value->modified_date_fr(); ?></br>
            </div>

            <a href="main_index.php?action=getArticle&amp;article_id=<?php echo $value->art_id(); ?>">Afficher le billet et ses commentaires</a>
        </div>
    <?php
        }
    ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>