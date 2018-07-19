<?php
require('./controllers/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listArticles') {
        listArticles();
    } elseif ($_GET['action'] == 'getArticle') {
        if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
            getArticle();
        }
        else {
            echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
        }
      }
}
else {
    listArticles();
}