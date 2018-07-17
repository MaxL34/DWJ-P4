<?php
class ArticlesManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function commentsFromArticle(Article $article) {
        $q = $this->_db->query('SELECT art_id a.id, article_id art.id FROM comments c INNER JOIN articles a ON a.id = art.id');
        $post = $q->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public function addArticle(Article $article) {
        $q = $this->_db->prepare('INSERT INTO articles (art_id, art_title, art_content, art_author, art_creation_date) VALUES (:art_id, :art_title, :art_content, :art_author, :NOW())');

        $q->bindValue(':art_id', $article->art_id());
        $q->bindValue(':art_title', $article->art_title());
        $q->bindValue(':art_content', $article->art_content());
        $q->bindValue(':art_author', $article->art_author());
        $q->bindValue(':art_creation_date', $article->NOW());

        $q->execute();
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
        
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, art_creation_date FROM articles'); /*WHERE com_id = $_GET['com_id']');*/

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