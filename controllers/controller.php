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

function listArticlesToEdit() {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);    
    $articles = $articlesManager->listArticles();
    require('./views/backend/articleEditionView.php');
}

function editArticle($article_id) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($article_id);
    require('./views/backend/articleUpdateView.php');
}

function updateArticle($art_title, $art_content, $art_id) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $articleToUpdate = $articlesManager->updateArticle($art_title, $art_content, $art_id);
}

function deleteArticle($article_id) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $commentsManager = new CommentsManager($db);
    $articleToDelete = $articlesManager->deleteArticle($article_id);
    $comsToDelete = $commentsManager->deleteComsFromArticle($article_id);
} 

function getArtCom($article_id) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($article_id);

    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($article_id);
    require('./views/frontend/postView.php');
}

function addArticle($art_title, $art_content, $art_author) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->addArticle($art_title, $art_content, $art_author);
    var_dump($article);
    require('./views/backend/articleCreationView.php');
}

function addComment($com_content, $com_author, $article_id) {
    $db = setDb();
    $commentsManager = new CommentsManager($db);
    $comment = $commentsManager->addComment($com_content, $com_author, $article_id);

    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($article_id);

    $comments = $commentsManager->getComFromArticle($article_id);
    require('./views/frontend/postView.php');
}

function deleteCom($article_id, $com_id) {
    $db = setDb();
    $commentsManager = new CommentsManager($db);
    $comToDelete = $commentsManager->deleteCom($article_id, $com_id);
    return $comToDelete;
}

function reportCom($article_id, $com_id) {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($article_id);

    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($article_id);

    $reportedCom = $commentsManager->reportComment($com_id);
    require('./views/frontend/postView.php');
}

function getReportedComs() {
    $db = setDb();
    $commentsManager = new CommentsManager($db);
    $var = $commentsManager->getReportedComs();  
    require('./views/backend/adminBoardView.php');
}

function createUser($login, $password) {
    $db = setDb();
    $usersManager = new UsersManager($db);
    $newUser = $usersManager->createUser($login, $password);
    require('./views/frontend/subscriptionView.php');
}

function doesUserExist($user) {
    $db = setDb();
    $usersManager = new UsersManager($db);
    $userToCheck = $usersManager->doesUserExist($user);
    return $userToCheck;
    require('./views/frontend/subscriptionView.php');
}

function logUser($login, $password) {
    $db = setDb();
    $usersManager = new UsersManager($db);
    $userToLog = $usersManager->logUser($login, $password);
    return $userToLog;   
    require('./views/backend/adminLoginView.php');
}

function setDb() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'mysqlpwd1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
}
