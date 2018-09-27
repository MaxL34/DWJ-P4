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
                    if (isset($_SESSION['user'])) {
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a></li>';
                        echo '<li><a id="signOut_link" href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a></li>';
                    } else {
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a></li>';
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></li>';  
                      }
                ?>
        </ul>

        <?= $content ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/commentAdder.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/login.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/signout.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/main.js"></script>

    </body>
</html>