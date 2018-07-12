<?php
class CommentsManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function readComment(Comment $comment) {
        $q = $this->_db->query('SELECT com_id, com_title, com_content, com_author, com_creation_date, com_modified_date FROM comments WHERE com_id = $_GET['com_id']');
        $answer = $q->fetch(PDO::FETCH_ASSOC);
    }

    public function addComment(Comment $comment) {
        $q = $this->_db->prepare('INSERT INTO comments (com_id, com_title, com_content, com_author, com_creation_date) VALUES (:com_id, :com_title, :com_content, :com_author, :NOW())');

        $q->bindValue(':com_id', $com->com_id());
        $q->bindValue(':com_title', $com->com_title());
        $q->bindValue(':com_content', $com->com_content());
        $q->bindValue(':com_author', $com->com_author());
        $q->bindValue(':com_creation_date', $com->NOW());

        $q->execute();
    }

    public function updateComment(Comment $comment) {
        $q = $this->_db->prepare('UPDATE comments SET com_title = :com_title, com_content = :com_content, com_modified_date = :NOW() WHERE com_id = :com_id');

        $q->bindValue(':com_title', $com->com_title());
        $q->bindValue(':com_content', $com->com_content());
        $q->bindValue(':com_modified_date', $com->NOW());
        $q->bindValue(':com_id', $com->com_id());

        $q->execute();
    }

    public function deleteComment(Comment $comment) {
        $q = $this->_db->query('DELETE FROM comments WHERE com_id = $_GET['com_id']');
    }

    public function listComments(Comment $comment) {
        $q = $this->_db->prepare('SELECT com_id, com_title, com_content, com_author, com_creation_date, com_modified_date FROM comments WHERE com_id = $_GET['com_id']');
        $answer = $q->fetch(PDO::FETCH_ASSOC);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}