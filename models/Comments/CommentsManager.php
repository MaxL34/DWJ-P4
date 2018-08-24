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
        $q = $this->_db->prepare('INSERT INTO comments (com_content, com_author, article_id, com_creation_date) VALUES (?, ?, ?, NOW())');
        $comment = $q->execute(array($com_content, $com_author, $article_id));
        return $comment;
    }

    public function updateComment(Comment $comment) {
        $q = $this->_db->prepare('UPDATE comments SET com_title = :com_title, com_content = :com_content, com_modified_date = :NOW() WHERE com_id = :com_id');

        $q->bindValue(':com_title', $comment->com_title());
        $q->bindValue(':com_content', $comment->com_content());
        $q->bindValue(':com_modified_date', $comment->NOW());
        $q->bindValue(':com_id', $comment->com_id());

        $q->execute();
    }

    public function deleteCom($article_id, $com_id) {
        $q = $this->_db->prepare('DELETE FROM comments WHERE article_id = ? AND com_id = ?');
        $commentToDelete = $q->execute(array($article_id, $com_id));
        return $commentToDelete;
    }

    public function deleteCommentsFromArticle($article_id) {
        $q = $this->_db->prepare('DELETE FROM comments WHERE article_id = ?');
        $commentToDelete = $q->execute(array($article_id));
        return $commentToDelete;
    }

    public function listComments() {
        $comments = [];
        
        $q = $this->_db->query('SELECT com_id, com_title, com_content, com_author, com_creation_date FROM comments'); /*WHERE com_id = $_GET['com_id']');*/

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function getComFromArticle($article_ID) {
        $comments = [];
        
        $q = $this->_db->prepare('SELECT com_id, com_content, com_author, com_creation_date, article_id FROM comments WHERE article_id = ? ORDER BY com_creation_date ASC');
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

        $q = $this->_db->prepare('SELECT com_id, com_content, com_author, com_creation_date, com_report_number, com_report_date FROM comments WHERE com_report_number >= 1 ORDER BY com_report_number DESC');
        $q->execute();
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $reportedComs[] = new Comment($data);
        } 
        $q->closeCursor();
        return $reportedComs;
        //var_dump($reportedComs);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}