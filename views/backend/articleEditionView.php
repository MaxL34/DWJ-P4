<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Création d'un article</title>
        <link href="style.css" rel="stylesheet" />        
    </head>

    <body>
        <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
        <?php
            if (isset($_SESSION['id'])) {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a>&nbsp';
                echo '<a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a>';
            } else {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a>&nbsp';
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a>';  
              }
        ?>

        <p>Quel billet voulez-vous modifier ?</p>

        <?php
            foreach ($articles as $value) {
        ?>
            <div>
                <p>
                    <?php echo $value->art_title(); ?>
                    <?php echo $value->art_content(); ?>
                    Publié le <?php echo $value->art_creation_date(); ?></br>
                    Par : <?php echo $value->art_author(); ?>
                </p>
                <a href="main_index.php?action=editArticle&amp;article_id=<?php echo $value->art_id(); ?>">Modifier le billet</a>
                <a href="main_index.php?action=deleteArticle&amp;article_id=<?php echo $value->art_id(); ?>">Supprimer le billet</a>
            </div>
        <?php
            }
        ?>
    </body>
</html>