<?php
require('../models/Comments/CommentsManager.php');

$db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', 'root', 'Jmc@Mysql!');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$commentManager = new CommentsManager($db);
$commentManager->readComment();
require('../views/frontend/indexView.php');
