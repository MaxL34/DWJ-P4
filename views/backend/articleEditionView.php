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
        <link rel="stylesheet" href="/tests/Openclassrooms/DWJ-P4/public/css/main.css" />        
    </head>

    <body>
        <ul class="main_menu">
                <li>
                    <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
                </li>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a></li>';
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a></li>';
                        } else {
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a></li>';
                            echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></li>';  
                        }
                    ?>
            </ul>

        <p class="edition_p">Quel billet voulez-vous modifier ?</p>
        
        <div class="container">
            <?php
                foreach ($articles as $value) {
            ?>
                <div class="article">
                    <p>
                        <?php echo $value->art_title(); ?>
                        <?php echo $value->art_content(); ?>
                        Publié le <?php echo $value->date_fr(); ?></br>
                        Par : <?php echo $value->art_author(); ?></br>
                        Modifié le : <?php echo $value->modified_date_fr(); ?>
                    </p>
                    <div class="edition_a">
                        <a href="main_index.php?action=editArticle&amp;article_id=<?php echo $value->art_id(); ?>">Modifier le billet</a>
                        <a href="main_index.php?action=deleteArticle&amp;article_id=<?php echo $value->art_id(); ?>">Supprimer le billet</a>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>