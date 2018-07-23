<?php
    require('./models/Articles/Article.php');
    require('./models/Articles/ArticlesManager.php');
    require('./models/Comments/Comment.php');
    require('./models/Comments/CommentsManager.php');
    require('./models/Users/User.php');
    require('./models/Users/UsersManager.php');

function listArticles() {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);    
    $articles = $articlesManager->listArticles();
    require('./views/frontend/articleView.php');
}

function getArtCom() {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($_GET['article_id']);

    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}

function addComment($com_content, $com_author, $article_id) {
    $db = setDb();
    $commentsManager = new CommentsManager($db);
    $comment = $commentsManager->addComment($com_content, $com_author, $article_id);

    if ($comment === false) {
        die('Impossible d\'ajouter le commentaire');
    } else {
        header('Location: ./main_index.php?action=getArticle&article_id=' .$article_id);
      }
    
    require('./views/frontend/postView.php');
}

function createUser($login, $password) {
    $db = setDb();
    $usersManager = new UsersManager($db);
    $newUser = $usersManager->createUser($login, $password);
    require('./views/backend/adminLoginView.php');
}

function logUser($login, $password) {
    $db = setDb();
    $usersManager = new UsersManager($db);
    $isAdmin = $usersManager->logUser($login, $password);
    if ($isAdmin['user_login'] === 'Admin8434' && $isAdmin['user_password'] === 'AdminBl0g_Jf') {
        header('Location: ./views/backend/adminBoard.php');
    } else {
        die('Identifiants de connexion incorrects');
      }
    require('./views/backend/adminLoginView.php');
}

function setDb() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
}