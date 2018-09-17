<?php $title = 'Blog de Jean Forteroche : Connexion à l\'espace d\'administration'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Billet simple pour l'Alaska</h1>
    <p>Connexion à l'espace d'administration du blog</p>
    <p>Veuillez entrer vos identifiants de connexion pour accéder à l'administration du blog</p>
</div>

<div>
    <form class="login_form" action="../../main_index.php?action=adminLogin" method="post">
        <div>
            <label for="user">Login : </label>
            <input class="user_login" type="text" id="user_login" name="user" />
        </div>

        <div>
            <label for="password">Mot de passe : </label>
            <input class="user_pass" type="password" id="user_password" name="password" />
        </div>

        <div>
            <input type="submit" value="Se connecter" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('../layout.php'); ?>