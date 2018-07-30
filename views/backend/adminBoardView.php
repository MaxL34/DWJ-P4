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

    <div id="comments_management">
        <p>Voici la liste des derniers commentaires signalés :</p>
            <div id="reported_comments">
                <?php var_dump($var); ?>
                <?php foreach ($reportedComs as $reportedCom) { ?>
                    <p>
                        Auteur : <?php echo $reportedCom->com_author(); ?></br>
                        Commentaire : <?php echo $reportedCom->com_content(); ?></br>
                        signalé le : <?php echo $reportedCom->com_report_date(); $reportedCom->com_report_id() . ' fois.' ?></br>
                    </p>
                <?php } ?>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('../layout.php'); ?>