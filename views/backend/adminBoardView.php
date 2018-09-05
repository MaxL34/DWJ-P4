<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Espace d\'administration du blog'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Espace d'administration</h1>
    <p><?php echo 'Bienvenue sur votre espace d\'administration ' . $_SESSION['user'] . '.'; ?></p>
    <p>Que souhaitez-vous faire ?</p>
</div>

<div class="article_management">
    <p>Rédiger un nouveau billet : </br><a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleCreationView.php">Rédaction de billets</a></p></br>
    <p>Editer un billet existant (modifier, supprimer) : </br><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit">Edition de billets</a></p></br>
    <p>Lire vos billets : </br><a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Lecture de billets</a></p></br>
</div>

<div class="comments_management">
    <p>Voici la liste des derniers commentaires signalés :</p>
        <div class="reported_comments">
            <?php
                foreach ($var as $value) { 
            ?>
            <p>
                Auteur : <?php echo $value->com_author(); ?></br>
                Commentaire : <?php echo $value->com_content(); ?></br>
                signalé le : <?php echo $value->com_date_fr() . ', ' . $value->com_report_number() . ' fois.' ?></br>
                <?php echo '<a href="main_index.php?action=deleteCom&amp;article_id=' . $value->article_id() . '&amp;com_id=' . $value->com_id() . '">Supprimer le commentaire</a>'; ?>
            </p>
        </div>
</div>
            <?php 
                } 
            ?>

<?php $content = ob_get_clean(); ?>
<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>