<?php $title = 'Blog de Jean Forteroche : Espace d\'édition des billets'; ?>

<?php ob_start(); ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet Simple pour l'Alaska</h1>
                    <span class="subheading">Page d'édition des articles<span>
                </div>
                </div>
            </div>
            </div>
</header>

<div class="post-container">
    <p class="edition_p">Quel billet voulez-vous modifier ?</p>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
            
                    <?php
                        foreach ($articles as $value) {
                    ?>
                    
                        <div class="post">
                            <h2 class="post-title">
                                <?php echo $value->art_title(); ?>
                            </h2>
                            <p class="post-content">
                                <?php echo $value->art_content(); ?>
                            </p>

                                    
                                    <!-- <input class="delete_btn" type="button" value="Supprimer" /> -->
                                    <!-- <input type="hidden" class="hidden_input" id="<?php echo $value->art_id(); ?>" /> -->
                            <input class="edit_btn" type="button" name="<?php echo $value->art_id(); ?>" value="Editer" />
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
</div>

<div id="modal_edit" class="modal">
    <div class="modal_content">
        <span class="close">&times;</span>
        <p id="modal_text"></p>
        <div id="buttons">
            <button id="edit">Editer</button>
            <button id="delete">Supprimer</button>
            <button id="yes">Oui</button>
            <button id="no">Non</button>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>