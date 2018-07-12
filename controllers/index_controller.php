<?php
require('../models/Comments/CommentsManager.php');

$db = new PDO('mysql:host=localhost;dbname=blog_jf', 'root', 'Jmc@Mysql!');
$commentManager = new  CommentsManager($db);
$commentManager->listComments($comment);
