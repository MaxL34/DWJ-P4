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

    public function addComment(Comment $comment) {
        $q = $this->_db->prepare('INSERT INTO comments (com_id, com_content, com_author, article_id, com_creation_date) VALUES (:com_id, :com_content, :com_author, :article_id, :NOW())');

        $q->bindValue(':com_id', $comment->com_id());
        $q->bindValue(':com_content', $comment->com_content());
        $q->bindValue(':com_author', $comment->com_author());
        $q->bindValue(':article_id', $comment->article_id());
        $q->bindValue(':com_creation_date', $comment->NOW());

        $q->execute();
    }

    public function updateComment(Comment $comment) {
        $q = $this->_db->prepare('UPDATE comments SET com_title = :com_title, com_content = :com_content, com_modified_date = :NOW() WHERE com_id = :com_id');

        $q->bindValue(':com_title', $comment->com_title());
        $q->bindValue(':com_content', $comment->com_content());
        $q->bindValue(':com_modified_date', $comment->NOW());
        $q->bindValue(':com_id', $comment->com_id());

        $q->execute();
    }

    public function deleteComment(Comment $comment) {
        /*$q = $this->_db->query('DELETE FROM comments WHERE com_id = $_GET['com_id']');*/
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
        
        $q = $this->_db->prepare('SELECT com_id, com_title, com_content, com_author, com_creation_date, article_id FROM comments WHERE article_id = ?');
        $q->execute(array($article_ID));
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);        
        }
        return $comments;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}