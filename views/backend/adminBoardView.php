<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Espace d\'administration du blog'; ?>

<?php ob_start(); ?>
<h1>Espace d'administration</h1>

<p><?php echo 'Heureux de vous revoir ' . $_SESSION['user'] . ' et bienvenue sur votre espace d\'administration.'; ?></p>

<p>Que souhaitez-vous faire ?</p>

<div id ="management">
    <div id="article_management">
        <p>Rédiger un nouveau billet : <a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleCreationView.php">Rédaction de billets</a></p></br>
        <p>Editer un billet existant (modifier, supprimer) : <a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleEditionView.php">Edition de billets</a></p></br>
        <p>Lire vos billets : <a href="/tests/Openclassrooms/DWJ-P4/views/backend/articleReadingView.php">Rédaction de billets</a></p></br>
    </div>

    <div id="comments_management">
</div>



<?php $content = ob_get_clean(); ?>
<?php
if (file_exists('../layout.php')) {
    require('../layout.php');
}
?>