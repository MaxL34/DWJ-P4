<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Espace d\'administration du blog'; ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet Simple pour l'Alaska</h1>
                    <span class="subheading">Espace d'administration<span>
                </div>
                </div>
            </div>
            </div>
</header>

<div class="article_management">
        <p>Rédiger un nouveau billet : </br><a href="index.php?action=createArticle">Rédaction de billets</a></p></br>
        <p>Editer un billet existant (modifier, supprimer) : </br><a href="index.php?action=listArticlesToEdit">Edition de billets</a></p></br>
        <p>Lire vos billets : </br><a href="index.php">Lecture de billets</a></p></br>
</div>

<div class="admin_comments">
        <p>Voici la liste des derniers commentaires signalés :</p>

            <?php
                if (isset($var)) {
                    foreach ($var as $value) {
            ?>
                <div>
                    <p>
                        Auteur : <?php echo $value->com_author(); ?></br>
                        Commentaire : <?php echo $value->com_content(); ?></br>
                        Signalé le : <?php echo $value->com_date_fr() . ', ' . $value->com_report_number() . ' fois.'; ?></br>
                        <input type="button" class="del_btn" name="<?php echo $value->com_id(); ?>" value="Supprimer le commentaire" />
                    </p>
                </div>
                <?php 
                            }
                        } 
                ?>
            
</div>

<div id="modal_delete" class="modal">
    <div class="modal_content">
        <span class="close">&times;</span>
        <p id="modal_text"></p>
        <div id="buttons">
            <button id="yes">Oui</button>
            <button id="no">Non</button>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php
    if (file_exists('./views/layout.php')) {
        require('./views/layout.php');
    }
?>