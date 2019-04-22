<?php $title = 'Blog de Jean Forteroche : Connexion à l\'espace d\'administration'; ?>

<?php ob_start(); ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Billet Simple pour l'Alaska</h1>
                        <span class="subheading">Connexion à l'espace d'administration<span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="login_container">
    <div class="title">
        <p>Veuillez entrer vos identifiants de connexion pour accéder à l'administration du blog</p>
    </div>

    <div>
        <form id="login_form" action="./index.php?action=adminLogin" method="post">
            <div>
                <label for="user">Login : </label>
                <input type="text" id="user_login" name="user" required />
            </div>

            <div>
                <label for="password">Mot de passe : </label>
                <input type="password" id="user_password" name="password" required />
            </div>

            <div>
                <input id="login_btn" type="submit" value="Se connecter" />
            </div>
        </form>
    </div>
</div>

<div id="modal_login" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>  
        <p id="modal_text"></p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php
    if (file_exists('./views/layout.php')) {
        require('./views/layout.php');
    }
?>