<?php $title = 'Blog de Jean Forteroche : Espace d\'édition des billets'; ?>

<?php ob_start(); ?>

<p class="edition_p">Quel billet voulez-vous modifier ?</p>
        
    <div class="container">
        <?php
            foreach ($articles as $value) {
        ?>
            <div class="article">
                    <?php echo $value->art_title(); ?>
                    <?php echo $value->art_content(); ?>
                    Publié le <?php echo $value->date_fr(); ?></br>
                    Par : <?php echo $value->art_author(); ?></br>
                    Modifié le : <?php echo $value->modified_date_fr(); ?></br>

                    <input class="edit_btn" type="button" data_id="<?php echo $value->art_id(); ?>" value="Editer" />
                    <input class="delete_btn" type="button" data2_id="<?php echo $value->art_id(); ?>" value="Supprimer" />
            </div>
        <?php
            }
        ?>
    </div>

<div id="modal_edit" class="modal">
    <div class="modal_content">
        <span class="close">&times;</span>
        <p id="modal_text">Voulez-vous vraiment supprimer ce billet ?</p>
        <button id="yes">Oui</button>
        <button id="no">Non</button>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>