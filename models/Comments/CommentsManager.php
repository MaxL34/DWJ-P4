<?php
class CommentsManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function readComment() {
        $q = $this->_db->query('SELECT com_title, com_content, com_author, com_creation_date FROM comments');
        
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment($data);
        }
        return $comment;

        $q->closeCursor();
    }

    public function addComment($com_content, $com_author, $article_id) {
        $q = $this->_db->prepare('INSERT INTO comments (com_content, com_author, fk_art_id, com_creation_date) VALUES (?, ?, ?, NOW())');
        $comment = $q->execute(array($com_content, $com_author, $article_id));
        return $comment;
    }

    public function deleteCom($com_id) {
        $q = $this->_db->prepare('DELETE FROM comments WHERE com_id = ?');
        $commentToDelete = $q->execute(array($com_id));
        return $commentToDelete;
    }

    public function deleteComsFromArticle($article_id) {
        $q = $this->_db->prepare('DELETE FROM comments WHERE fk_art_id = ?');
        $commentToDelete = $q->execute(array($article_id));
        return $commentToDelete;
    }

    public function listComments() {
        $comments = [];
        $q = $this->_db->query('SELECT com_id, com_title, com_content, com_author, DATE_FORMAT(com_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_date_fr FROM comments');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getComFromArticle($article_ID) {
        $comments = [];
        $q = $this->_db->prepare('SELECT com_id, com_content, com_author, fk_art_id, com_report_number, DATE_FORMAT(com_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_date_fr FROM comments WHERE fk_art_id = ? ORDER BY com_creation_date DESC');
        $q->execute(array($article_ID));
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);        
        }
        return $comments;
    }

    public function reportComment($com_id) {
        $q = $this->_db->prepare('UPDATE comments SET com_report_number = com_report_number + 1, com_report_date = NOW() WHERE com_id = ?');
        $reportedCom = $q->execute(array($com_id));
        return $reportedCom;
    }

    public function getReportedComs() {
        $reportedComs = [];
        $q = $this->_db->prepare('SELECT com_id, com_content, com_author, com_creation_date, com_report_number, fk_art_id, DATE_FORMAT(com_report_date, \'%d/%m/%Y à %Hh%imin%ss\') AS com_date_fr FROM comments WHERE com_report_number >= 1 ORDER BY com_report_number DESC');
        $q->execute();
        
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $reportedComs[] = new Comment($data);
        } 
        $q->closeCursor();
        return $reportedComs;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}