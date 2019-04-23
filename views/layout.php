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

        <!-- Bootstrap core CSS -->
        <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="./css/clean-blog.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="index.html">Blog de Jean Forteroche</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=displayAbout">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listArticles">Chapitres</a>
                </li>

                <?php
                    if (isset($_SESSION['user'])) {
                        $sessionUser = $_SESSION['user'];
                        echo '<li class="nav-item"><a class="nav-link" href="./index.php?action=adminBoardDisplay">Administration</a></li>';
                        echo '<li class="nav-item"><a class="nav-link signOut_link" href="./index.php?action=signOut">Déconnexion</a></li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="./index.php?action=login">Administration</a></li>';
                    }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>

        <?= $content ?>

        <!-- Footer -->
        <footer>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
                </div>
            </div>
            </div>
        </footer>

        <div id="modal_logout" class="modal">
            <div class="modal_content">
                <p id="modal_text">A bientôt <?php echo $sessionUser; ?></p>
            </div>
        </div>

        <script src="./js/jquery/jquery-3.3.1.min.js"></script>
        <script>var sUser = '<?php echo $sessionUser; ?>';console.log(sUser);</script>
        <script src="./js/scroll.js"></script>
        <script src="./js/commentAdder.js"></script>
        <script src="./js/reportCom.js"></script>
        <script src="./js/deleteCom.js"></script>
        <script src="./js/login.js"></script>
        <script src="./js/clean-blog.js"></script>
        <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <?php
            if (isset($_SESSION['user'])) {
                echo '<script src="./js/signout.js"></script>';
                echo '<script src="./js/articleUpdater.js"></script>';
                echo '<script src="./js/articleAdder.js"></script>';
                echo '<script src="./js/editArticle.js"></script>';
            }
        ?>
        <script src="./js/main.js"></script>
    </body>
</html>