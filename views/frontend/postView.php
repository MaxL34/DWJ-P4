<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Billet : <?php echo $articles[$art_title]; ?> et ses commentaires</p>

<?php
    foreach ($articles as $value) {
?>
    <div>
        <p>
            <?php echo $value->art_title(); ?></br>
            <?php echo $value->art_content(); ?></br>
            <?php echo $value->art_author(); ?></br>
        </p>
        <a href="../views/frontend/postView.php">Afficher le billet et ses commentaires</a>
    </div>
<?php
    }
?>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>