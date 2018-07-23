<?php
    require('./models/Articles/Article.php');
    require('./models/Articles/ArticlesManager.php');
    require('./models/Comments/Comment.php');
    require('./models/Comments/CommentsManager.php');

function listArticles() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($_GET['article_id']);

    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $commentsManager = new CommentsManager($db);
    $comments = $commentsManager->getComFromArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}