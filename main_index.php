<?php
require('controllers/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'getArticle') {
        if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
            getArtCom();
        } else {
            echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
          }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
            if (!empty($_POST['com_content']) && !empty($_POST['com_author'])) {
                addComment($_POST['com_content'], $_POST['com_author'], $_GET['article_id']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}

else {
    listArticles();
}