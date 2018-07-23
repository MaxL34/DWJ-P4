<?php $title = 'Blog de Jean Forteroche : Articles'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Liste des billets du blog</p>

<?php
    foreach ($articles as $value) {
?>
    <div>
        <p>
            <?php echo $value->art_title(); ?></br>
            <?php echo $value->art_content(); ?></br>
            <?php echo $value->art_author(); ?></br>
        </p>
        <a href="./main_index.php?action=getArticle&amp;article_id=<?php echo $value->art_id(); ?>">Afficher le billet et ses commentaires</a>
    </div>
<?php
    }
?>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>