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
        $articleToAdd = $q->execute(array($art_title, $art_content, $art_author));
        return $articleToAdd;
    }

    public function updateArticle($art_title, $art_content, $art_id) {
        $q = $this->_db->prepare('UPDATE articles SET art_title = ?, art_content = ?, art_modified_date = NOW() WHERE art_id = ?');
        $articleToUpdate = $q->execute(array($art_title, $art_content, $art_id));
        return $articleToUpdate;
    }

    public function deleteArticle($article_id) {
        $q = $this->_db->prepare('DELETE FROM articles WHERE art_id = ?');
        $articleToDelete = $q->execute(array($article_id));
        return $articleToDelete;
    }

    public function listArticles() {
        $articles = [];
        
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, DATE_FORMAT(art_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY date_fr ASC');

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