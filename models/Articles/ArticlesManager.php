<?php
class ArticlesManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function getArticle($article_ID) {
        $q = $this->_db->prepare('SELECT art_id, art_title, art_content, art_author, art_creation_date, art_modified_date FROM articles WHERE art_id = ?');
        $q->execute(array($article_ID));
        $article = $q->fetch(PDO::FETCH_ASSOC);

        return $article;
        
    }

    public function addArticle($art_title, $art_content, $art_author) {
        $q = $this->_db->prepare('INSERT INTO articles (art_title, art_content, art_author, art_creation_date) VALUES (?, ?, ?, NOW())');

        //$q->bindValue(':title', $title->art_title());
        //$q->bindValue(':content', $content->art_content());
        //$q->bindValue(':author', $author->art_author());
        //$q->bindValue(':art_creation_date', $article->NOW());

        $articleToAdd = $q->execute(array($art_title, $art_content, $art_author));
        return $articleToAdd;
    }

    public function updateArticle(Article $article) {
        $q = $this->_db->prepare('UPDATE articles SET art_title = :art_title, art_content = :art_content, art_modified_date = :NOW() WHERE art_id = :art_id');

        $q->bindValue(':art_title', $article->art_title());
        $q->bindValue(':art_content', $article->art_content());
        $q->bindValue(':art_modified_date', $article->NOW());
        $q->bindValue(':art_id', $article->art_id());

        $q->execute();
    }

    public function deleteArticle(Article $article) {
        //$q = $this->_db->query('DELETE FROM articles WHERE art_id = $_GET['art_id']');
    }

    public function listArticles() {
        $articles = [];
        
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, art_creation_date FROM articles');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }

        return $articles;
    }

    public function recentArticlesList() {
        $recentArticles = [];
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, art_creation_date FROM articles GROUP BY art_creation_date DESC LIMIT 3');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $recentArticles[] = new Article($data);
        }
        return $recentArticles;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}