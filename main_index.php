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
        
        case 'addArticle':
            session_start();
            $title = rtrim($_POST['title']);
            $content = rtrim($_POST['content']);

            if (!empty($title) && !empty($content)) {
                addArticle($_POST['title'], $_POST['content'], $_SESSION['user']);
                echo 'Votre article a bien été ajouté';
            } else {
                echo 'Veuillez remplir les champs nécessaires';
            }
        break;

        case 'listArticlesToEdit':
            listArticlesToEdit();
        break;

        case 'editArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                editArticle();
            } else {
                echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
            }
        break;

        case 'updateArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                $title = rtrim($_POST['title']);
                $content = rtrim($_POST['content']);

                if (!empty($title) && !empty($content)) {
                    updateArticle($_GET['article_id'], $_POST['title'], $_POST['content']);
                } else {
                    echo 'Veuillez remplir les champs nécessaires';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        break;

        case "deleteArticle":
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                deleteArticle($_GET['article_id']);
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

        case 'reportCom':
            if (isset($_GET['com_id'])) {
                reportCom($_GET['com_id']);
                echo 'Le commentaire posté a bien été signalé, il sera soumis à une modération par l\'administrateur du blog';
            }
        break;

        case 'adminLogin':
            if (!empty($_POST['user']) && (!empty($_POST['password']))) {
                
                
                if (logUser($_POST['user'], $_POST['password']) == true) {
                    logUser($_POST['user'], $_POST['password']);
                    
                    session_start();
                    $_SESSION['id'] = logUser($_POST['user'], $_POST['password']);
                    $_SESSION['user'] = $_POST['user'];

                    $var = getReportedComs();
                    
                } else {
                    echo 'Identifiants de connexion incorrects';
                }
            } else {
                echo 'Veuiller remplir chaque champ';
            }
        break;

        case 'adminBoardDisplay':
            $var = getReportedComs();
        break;

        case 'createUser':   
            $user = rtrim($_POST['user']);
            $password = rtrim($_POST['password']);

            if (!empty($user) && !empty($password)) {
                if (doesUserExist($_POST['user']) == FALSE) {
                    createUser($_POST['user'], $_POST['password']);

                    session_start();
                    $_SESSION['id'] = logUser($_POST['user'], $_POST['password']);
                    $_SESSION['user'] = $_POST['user'];

                    $var = getReportedComs();

                } elseif (doesUserExist($_POST['user']) == TRUE) {
                    echo 'Le pseudo ' . $_POST['user'] . ' est déjà utilisé, veuillez en choisir un autre';
                  } 
            } else {
                echo 'Veuillez renseigner un pseudo et un mot de passe valides';
              }
        break;

        case 'signOut':
            session_start();
            if (isset($_SESSION['id'])) {
                echo 'A bientôt ' . $_SESSION['user'] . ' <a href="/tests/Openclassrooms/DWJ-P4/main_index.php">Retour à l\'accueil</a>';
                session_destroy();
            }
        break;

        default:
            echo 'Erreur : aucune valeur pour le paramètre "action"';
    }
} else {
        listArticles();
      }