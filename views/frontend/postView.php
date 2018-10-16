<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Billet simple pour l'Alaska</h1>
    <?php echo $article->art_title(); ?>
</div>

<div class="postView_article">
    <p>
        <?php echo $article->art_content(); ?>
        Posté le : <?php echo $article->date_fr(); ?></br>
        Par : <?php echo $article->art_author(); ?></br>
        Modifié le <?php echo $article->modified_date_fr(); ?>
    </p>
</div>

<div class="comments">
    <p>Commentaires du billet</p>
    <?php foreach ($comments as $comment) { ?>
    <p>
        Commentaire : <?php echo $comment->com_content(); ?></br>
        Posté par : <?php echo $comment->com_author(); ?></br>
        le : <?php echo $comment->com_date_fr(); ?></br>
        
        <a class="report_com" href="main_index.php?action=reportCom&amp;article_id=<?php echo $article->art_id(); ?>&amp;com_id=<?php echo $comment->com_id(); ?>">Signaler</a>
        
    </p>
    <?php } ?>
</div>

<div class="add_com">
    <button>Ajouter un commentaire</button>
</div>

<form class ="com_form" action="main_index.php?action=addComment&amp;article_id=<?php echo $article->art_id(); ?>" method="post">
    <div>
        <label for="com_author">Pseudo : </label>
        <input class="com_author" type="text" id ="author" name="com_author" placeholder="Votre pseudo" required />
        <span class="missPseudo"></span>
    </div>

    <div>
        <label for="com_content">Votre commentaire : </label>
        <textarea class="com_content" id="content" name="com_content" placeholder="Votre commentaire" required></textarea>
        <span class="missCom"></span>
    </div>

    <div>
        <input class="com_submit_btn" type="submit" />
    </div>
</form>

<div class="com_submit_message">
    <p></p>
</div>

<script>var artId = <?php echo $article->art_id(); ?>;</script>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>