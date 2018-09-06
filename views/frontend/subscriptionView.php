<?php $title = 'Blog de Jean Forteroche : Inscription à l\'espace membre'; ?>

<?php ob_start(); ?>
<div class="title">
    <h1>Billet simple pour l'Alaska</h1>
    <p>Page d'inscription à l'espace membre</p>
</div>

<div>
    <form class="login_form" action="../../main_index.php?action=createUser" method="post">
        <div>
            <label for="user">Login : </label>
            <input type="text" id="user_login" name="user" />
        </div>

        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" id="user_password" name="password" />
        </div>

        <div>
            <input type="submit" value="S'inscrire" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php
if (file_exists('../layout.php')) {
    require('../layout.php');
}
?>