<?php
class ArticlesManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function getArticle($article_ID) {
        $article = [];

        $q = $this->_db->prepare('SELECT art_id, art_title, art_content, art_author, DATE_FORMAT(art_modified_date, \'%d/%m/%Y à %Hh%imin%ss\') AS modified_date_fr, DATE_FORMAT(art_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles WHERE art_id = ?');
        $q->execute(array($article_ID));
        
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article($data);
        }
        return $article;
    }

    public function addArticle($art_title, $art_content, $art_author) {
        $q = $this->_db->prepare('INSERT INTO articles (art_title, art_content, art_author, art_creation_date) VALUES (?, ?, ?, NOW())');
        $articleToAdd = $q->execute(array($art_title, $art_content, $art_author));

        $addedArticle = [];
        $req = $this->_db->prepare('SELECT art_title, art_content, art_author, art_id, DATE_FORMAT(art_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles WHERE art_title = ?');
        $req->execute(array($art_title));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $addedArticle = new Article($data);
        }
        return $addedArticle;
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

    public function listLastArticles() {
        $articles = [];
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, DATE_FORMAT(art_modified_date, \'%d/%m/%Y à %Hh%imin%ss\') AS modified_date_fr, DATE_FORMAT(art_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY art_creation_date DESC LIMIT 3');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function listArticles() {
        $articles = [];
        $q = $this->_db->query('SELECT art_id, art_title, art_content, art_author, DATE_FORMAT(art_modified_date, \'%d/%m/%Y à %Hh%imin%ss\') AS modified_date_fr, DATE_FORMAT(art_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM articles ORDER BY art_creation_date ASC');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}