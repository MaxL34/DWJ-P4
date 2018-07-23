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
        Commentaire : <?php echo $comment->com_content(); ?></br>
        Posté par : <?php echo $comment->com_author(); ?></br>
        le : <?php echo $comment->com_creation_date(); ?></br>
    </p>
    <?php } ?>

    <form action="./main_index.php?action=addComment&amp;article_id=<?php echo $article['art_id']; ?>" method="post">
        <div>
            <label for="com_author">Nom : </label>
            <input type="text" id ="author" name="com_author" />
        </div>

        <div>
            <label for="com_content">Votre commentaire : </label>
            <textarea id="content" name="com_content"></textarea>
        </div>

        <div>
            <input type="submit" />
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('frontTemplate.php'); ?>