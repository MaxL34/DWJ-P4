<?php
require('../models/Comments/CommentsManager.php');
require('../models/Comments/Comment.php');

$db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8', '', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$commentManager = new CommentsManager($db);
$comments = $commentManager->listComments();
require('../views/frontend/indexView.php');
