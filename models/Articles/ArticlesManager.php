<?php
class ArticlesManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function addArticle(Articles $article) {
        $q=$this->_db->prepare('INSERT INTO articles (art_id, art_title, art_content, art_author, art_creation_date) VALUES (:art_id, :art_title, :art_content, :art_author, :NOW())');

        $q->bindValue(':art_id', $article->art_id());
        $q->bindValue(':art_title', $article->art_title());
        $q->bindValue(':art_content', $article->art_content());
        $q->bindValue(':art_author', $article->art_author());
        $q->bindValue(':art_creation_date', $article->NOW());
    }

    
}