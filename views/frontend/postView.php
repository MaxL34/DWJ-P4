<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Billet : "<?php echo $article['art_title']; ?>" et ses commentaires</p>

<div>
    <p>
        <?php echo $article['art_content']; ?></br>
        <?php echo $article['art_author']; ?></br>
    </p>

    <p>Commentaires du billet</p>
    <?php foreach ($comments as $comment) { ?>
    <p>
        <?php echo $comment->com_content(); ?></br>
        <?php echo $comment->com_author(); ?></br>
    </p>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>