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

                    <input type="button" onclick="document.location.href='/tests/Openclassrooms/DWJ-P4/main_index.php?action=editArticle&amp;article_id=<?php echo $value->art_id(); ?>';" value="Editer" />
                    <input type="button" onclick="document.location.href='/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteArticle&amp;article_id=<?php echo $value->art_id(); ?>';" value="Supprimer" />
            </div>
        <?php
            }
        ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php 
    if (file_exists('views/layout.php')) {
        require('views/layout.php');
    }
?>