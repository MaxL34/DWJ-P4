<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Création d\'un article'; ?>

<?php ob_start(); ?>

    <div class="article_creation_container">                
        <h1>Rédaction d'un nouveau billet</h1>
            <form class="article_form" action="../../main_index.php?action=addArticle" method="post">
                <p>Titre du billet :</p>
                    <textarea class="content" id="art_title" name="title"></textarea></br>
                <p>Contenu du billet :</p>
                    <textarea class="content" id="art_content" name="content"></textarea></br>
                <!-- <input type="hidden" id="session_user" name="user" value=<?php echo $_SESSION['user']; ?> /> -->
                <input id="art_submit_btn" name="art_send" type="submit" value="Envoyer" />
            </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('../layout.php')) {
        require('../layout.php');
    }
?>