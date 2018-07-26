<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    </head>

    <body>
        <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
        <?php
            if (isset($_SESSION['id'])) {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminBoardView.php">Administration</a>';       
            } else {
                echo '<a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a>';   
              }
        ?>
        <a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></br>

        <?= $content ?>
    </body>
</html>