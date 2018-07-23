<?php
    require('./models/Articles/Article.php');
    require('./models/Articles/ArticlesManager.php');
    require('./models/Comments/Comment.php');
    require('./models/Comments/CommentsManager.php');

function listArticles() {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);    
    $articles = $articlesManager->listArticles();
    require('./views/frontend/articleView.php');
}

/*function getArticle() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}

function getComFromArticle() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}*/

function getArtCom() {
    $db = setDb();
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($_GET['article_id']);

    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}

function addComment($comment) {
    $db = setDb();
    $commentsManager = new CommentsManager($db);
    $commentToAdd = $commentsManager->addComment($comment);
    $commentToAdd = new Comment(array($comment));
    require('./views/frontend/postView.php');
}

function setDb() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
}