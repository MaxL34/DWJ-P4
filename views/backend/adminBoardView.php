<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Espace d\'administration du blog'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Espace d'administration</h1>
    <p>Bienvenue sur votre espace d'administration <span id="session_user"><?php echo $_SESSION['user']; ?></span>.</p>
    <p>Que souhaitez-vous faire ?</p>
</div>

<div class="article_management">
    <p>Rédiger un nouveau billet : </br><a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleCreationView.php">Rédaction de billets</a></p></br>
    <p>Editer un billet existant (modifier, supprimer) : </br><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit">Edition de billets</a></p></br>
    <p>Lire vos billets : </br><a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Lecture de billets</a></p></br>
</div>

<div class="comments">
    <p>Voici la liste des derniers commentaires signalés :</p>
        <?php
            foreach ($var as $value) { 
        ?>
            <p>
                Auteur : <?php echo $value->com_author(); ?></br>
                Commentaire : <?php echo $value->com_content(); ?></br>
                signalé le : <?php echo $value->com_date_fr() . ', ' . $value->com_report_number() . ' fois.' ?></br>
                <?php echo '<a class="delete_com_link" href="main_index.php?action=deleteCom&amp;article_id=' . $value->article_id() . '&amp;com_id=' . $value->com_id() . '">Supprimer le commentaire</a>'; ?>
            </p>

        <?php 
            } 
        ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>