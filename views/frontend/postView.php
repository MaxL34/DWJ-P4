<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php var_dump($article); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Billet : <?php echo $article['art_title']; ?> et ses commentaires</p>

<div>
    <p>
        <?php echo $article['art_content']; ?></br>
        <?php echo $article['art_author']; ?></br>
    </p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>