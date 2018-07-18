<?php
require('../models/Articles/ArticlesManager.php');
require('../models/Articles/Article.php');

$db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$articlesManager = new ArticlesManager($db);
$articles = $articlesManager->listArticles();

//$article_ID = $_GET['article_id'];
//$post = $articlesManager->commentsFromArticle($article_ID);
require('../views/frontend/articleView.php');
//require('../views/frontend/postView.php');