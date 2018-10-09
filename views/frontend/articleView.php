<?php $title = 'Blog de Jean Forteroche : Articles'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Billet simple pour l'Alaska</h1>
        <p>Liste des billets du blog</p>
</div>

<div class="container">
    <?php
        foreach ($articles as $value) {
    ?>
        <div class="article">
                <?php echo $value->art_title(); ?>
                <?php echo $value->art_content(); ?>
                Publié le <?php echo $value->date_fr(); ?></br>
                Par : <?php echo $value->art_author(); ?></br>
                Modifié le : <?php echo $value->modified_date_fr(); ?></br>
                <a href="main_index.php?action=getArticle&amp;article_id=<?php echo $value->art_id(); ?>">Afficher le billet et ses commentaires</a>
        </div>
    
    <?php
        }
    ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>