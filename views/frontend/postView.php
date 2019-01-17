<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php ob_start(); ?>

<div id="postView_container">
    <div class="post_title">
        <h1>Billet simple pour l'Alaska</h1>
        <?php echo $article->art_title(); ?>
    </div>

        <div class="postView_article">
            <?php echo $article->art_content(); ?>
        </div>

            <div class="post_infos">
                    Posté le : <?php echo $article->date_fr(); ?></br>
                    Par : <?php echo $article->art_author(); ?></br>
                    Modifié le <?php echo $article->modified_date_fr(); ?>
            </div>

                <div id="add_com">
                    <button>Ajouter un commentaire</button>
                </div>

                <form id="com_form" action="main_index.php?action=addComment" method="post">
                    <div>
                        <label for="com_author">Pseudo : </label>
                        <input class="com_author" type="text" id="author" name="com_author" placeholder="Votre pseudo" required/>
                        <span id="missPseudo"></span>
                    </div>

                        <div>
                            <label for="com_content">Votre commentaire : </label>
                            <textarea class="com_content" id="content" name="com_content" placeholder="Votre commentaire" required></textarea>
                            <span id="missCom"></span>
                        </div>

                            <input type="hidden" id="art_id" name="art_id" value="<?php echo $article->art_id(); ?>" />

                                <div>
                                    <input id="com_submit_btn" type="submit" />
                                </div>
                </form>

                    <div class="comments">
                        <p>Commentaires du billet :</p>
                        <?php foreach ($comments as $comment) { ?>
                        <p>
                            Commentaire : <?php echo $comment->com_content(); ?></br>
                            Posté par : <?php echo $comment->com_author(); ?></br>
                            le : <?php echo $comment->com_date_fr(); ?></br>
                            
                            <!-- <a class="report_com" href="main_index.php?action=reportCom&amp;article_id=<?php echo $article->art_id(); ?>&amp;com_id=<?php echo $comment->com_id(); ?>">Signaler</a> -->
                            <input class="report_com_btn" type="button" id="<?php echo $comment->com_id(); ?>" value="Signaler" />
                            
                        </p>
                        <?php } ?>
                    </div>

<div id="modal_com" class="modal">
    <div class="modal_content">
        <p id="modal_text"></p>
    </div>
</div>

<script>var artId = <?php echo $article->art_id(); ?>;</script>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>