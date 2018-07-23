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

    <form action="./controllers/controller.php" method="post">
        <div>
            <label for="name">Nom : </label>
            <input type="text" id ="name" name="user_name">
        </div>

        <div>
            <label for="content">Votre commentaire : </label>
            <input type="textarea" id="content" name="user_comment">
        </div>

        <div>
            <button type="submit">Poster le commentaire</button>
        </div>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>