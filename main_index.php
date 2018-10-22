<?php
require('./controllers/controller.php');

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                getArtCom($_GET['article_id']);
            } else {
                echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
            }
        break;
        
        case 'addArticle':
            session_start();
            $title = rtrim($_POST['title']);
            $content = rtrim($_POST['content']);

            if (!empty($title) && !empty($content)) {
                $artId = addArticle($_POST['title'], $_POST['content'], $_SESSION['user']);
                echo $artId;
            } else if (empty($title) && empty($content)) {
                echo 'failed';
            } else if (empty($title) && !empty($content)) {
                echo 'title_missing';
            } else if (!empty($title) && empty($content)) {
                echo 'content_missing';
            } else {
                echo 'erreur non gérée';
            } 
        break;

        case 'listArticlesToEdit':
            listArticlesToEdit();
        break;

        case 'editArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                editArticle($_GET['article_id']);
                //header('Location: /tests/Openclassrooms/DWJ-P4/views/backend/articleUpdateView.php');
                //echo 'success';
            } else {
                echo 'Erreur d\'id d\'article : aucun id envoyé ou id inexistant';
            }
        break;

        case 'updateArticle':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                $title = rtrim($_POST['title']);
                $content = rtrim($_POST['content']);

                if (!empty($title) && !empty($content)) {
                    updateArticle($title, $content, $_GET['article_id']);
                    echo 'success';
                } else {
                    echo 'missing';
                }
            } else {
                echo 'failed';
            }
        break;

        case "deleteArticle":
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0) {
                deleteArticle($_GET['article_id']);
                //header('Location: /tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit');
            }
        break;

        case 'addComment':
            $content = rtrim($_POST['com_content']);
            $author = rtrim($_POST['com_author']);

            if (isset($_POST['art_id']) && $_POST['art_id'] > 0) {
                if (!empty($content) && !empty($author)) {
                    addComment($content, $author, $_POST['art_id']);
                    echo 'success';
                } else if (empty($author)) {
                    echo 'author_missing';
                } else if (empty($content)) {
                    echo 'content_missing';
                }
            } else {
                echo 'id_error';
            }
                //} else {
                    //die('contenu ou pseudo manquant.');
                //}      
            //} else {
                //die('aucun id de billet renseigné');
            //}
            //echo 'success';
            /*if ($comment === false) {
                die('Impossible d\'ajouter le commentaire');
            }
                //}
            } else {
                echo 'Aucun id de billet paramétré.';
            }*/
        break;

        case 'deleteCom':
            if (isset($_GET['article_id']) && $_GET['article_id'] > 0 && $_GET['com_id'] !== NULL) {
                deleteCom($_GET['article_id'], $_GET['com_id']);
                echo 'success';
            }
        break;

        case 'reportCom':
            if (isset($_GET['com_id'])) {
                reportCom($_GET['article_id'], $_GET['com_id']);
            }
        break;

        case 'adminLogin':
            if (!empty($_POST['user']) && (!empty($_POST['password']))) {
                if (logUser($_POST['user'], $_POST['password']) == true) {
                    logUser($_POST['user'], $_POST['password']);
                    
                    session_start();
                    $_SESSION['user'] = $_POST['user'];
                    echo 'success';
                } else {
                    echo 'failed';
                }
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
            if (isset($_SESSION['user'])) {
                session_destroy();
            }
        break;

        default:
            echo 'Erreur : aucune valeur pour le paramètre "action"';
    }
} else {
        listArticles();
      }
?>