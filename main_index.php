<?php
require('./controllers/controller.php');

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                getArtCom();
            } else {
                echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
            }
        break;
        
        case 'addComment':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                if (!empty($_POST['com_content']) && !empty($_POST['com_author'])) {
                    addComment($_POST['com_content'], $_POST['com_author'], $_GET['article_id']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        break;

        case 'adminLogin':
            if (!empty($_POST['user']) && (!empty($_POST['password']))) {
                logUser($_POST['user'], $_POST['password']);
            
                if ($_POST['user'] == 'Admin8434' && $_POST['password'] == 'AdminBl0g_Jf') {
                    header('Location: views/backend/adminBoard.php');
                } else {
                    echo 'Identifiants de connexion incorrects';
                }
            }
        break;
        
        case 'createUser':
            if (!empty($_POST['user']) && (!empty($_POST['password']))) {
                createUser($_POST['user'], $_POST['password']);
            }
        break;

        default:
            echo 'Erreur : aucune valeur pour le paramètre "action"';
    }
} else {
        listArticles();
      }