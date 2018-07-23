<?php
    require('./models/Articles/Article.php');
    require('./models/Articles/ArticlesManager.php');

function listArticles() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $articlesManager = new ArticlesManager($db);    
    $articles = $articlesManager->listArticles();
    require('./views/frontend/articleView.php');
}

function getArticle() {
    $db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $articlesManager = new ArticlesManager($db);
    $article = $articlesManager->getArticle($_GET['article_id']);
    require('./views/frontend/postView.php');
}