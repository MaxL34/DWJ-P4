<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Espace d\'administration du blog'; ?>

<?php ob_start(); ?>
<h1>Espace d'administration</h1>

<p><?php echo 'Bienvenue sur votre espace d\'administration ' . $_SESSION['user'] . '.'; ?></p>

<p>Que souhaitez-vous faire ?</p>

<div id ="management">
    <div id="article_management">
        <p>Rédiger un nouveau billet : <a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleCreationView.php">Rédaction de billets</a></p></br>
        <p>Editer un billet existant (modifier, supprimer) : <a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleEditionView.php">Edition de billets</a></p></br>
        <p>Lire vos billets : <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Lecture de billets</a></p></br>
    </div>
</div>

    <div id="comments_management">
        <p>Voici la liste des derniers commentaires signalés :</p>
            <div id="reported_comments">
                <?php
                    //gettype($var);
                    //var_dump($var);
                    foreach ($var as $value) { 
                ?>
                <p>
                    Auteur : <?php echo $value->com_author(); ?></br>
                    Commentaire : <?php echo $value->com_content(); ?></br>
                    signalé le : <?php echo $value->com_report_date() . ' ' . $value->com_report_id() . ' fois.' ?></br>
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