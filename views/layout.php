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
        <script <?= $tinyMCE_API ?>></script>
        <script <?= $tinyMCE_DefaultEditor ?>></script>
        <script <?= $tinymceInit ?>></script>
        <link rel="stylesheet" href="/tests/Openclassrooms/DWJ-P4/public/css/main.css" />
    </head>

    <body>
        <ul class="main_menu">
            <li>
                <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Accueil</a>
            </li>
                <?php
                    if (isset($_SESSION['user'])) {
                        $sessionUser = $_SESSION['user'];
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay">Administration</a></li>';
                        echo '<li><a class="signOut_link" href="/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut">Déconnexion</a></li>';
                    } else {
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/backend/adminLoginView.php">Administration</a></li>';
                        echo '<li><a href="/tests/Openclassrooms/DWJ-P4/views/frontend/subscriptionView.php">Inscription</a></li>';  
                      }
                ?>
        </ul>

        <?= $content ?>

        <script src="/tests/Openclassrooms/DWJ-P4/public/js/jquery/jquery-3.3.1.min.js"></script>
        <script>var sUser = '<?php echo $sessionUser; ?>';console.log(sUser);</script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/commentAdder.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/reportCom.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/deleteCom.js"></script>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/login.js"></script>
        <?php
            if (isset($_SESSION['user'])) {
                echo '<script src="/tests/Openclassrooms/DWJ-P4/public/js/signout.js"></script>';
                echo '<script src="/tests/Openclassrooms/DWJ-P4/public/js/articleAdder.js"></script>';
            }
        ?>
        <script src="/tests/Openclassrooms/DWJ-P4/public/js/main.js"></script>

    </body>
</html>