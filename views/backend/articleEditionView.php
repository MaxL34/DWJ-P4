<?php $title = 'Blog de Jean Forteroche : Espace d\'édition des billets'; ?>

<?php ob_start(); ?>

<p class="edition_p">Quel billet voulez-vous modifier ?</p>
        
    <div id="container">
        <?php
            foreach ($articles as $value) {
        ?>
            
            <div class="container_article">
                <div class="article">
                        <?php echo $value->art_title(); ?>
                        <?php echo $value->art_content(); ?>
                        Publié le <?php echo $value->date_fr(); ?></br>
                        Par : <?php echo $value->art_author(); ?></br>
                        Modifié le : <?php echo $value->modified_date_fr(); ?></br>

                        
                        <!-- <input class="delete_btn" type="button" value="Supprimer" /> -->
                        <!-- <input type="hidden" class="hidden_input" id="<?php echo $value->art_id(); ?>" /> -->
                </div>

                <input class="edit_btn" type="button" id="<?php echo $value->art_id(); ?>" value="Editer" />

            </div>
        <?php
            }
        ?>
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