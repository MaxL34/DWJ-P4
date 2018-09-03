<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/tests/Openclassrooms/DWJ-P4/public/css/main.css" />
        <title><?= $title ?></title>         
    </head>

    <body>
        <ul class="main_menu">
            <li>
                <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
            </li>
                <?php
                    if (isset($_SESSION['id'])) {
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a></li>';
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a></li>';
                    } else {
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a></li>';
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></li>';  
                      }
                ?>
        </ul>
        
        <?= $content ?>
    </body>
</html>