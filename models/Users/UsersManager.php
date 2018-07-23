<?php
class UsersManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function createUser($login, $password) {
        $q = $this->_db->prepare('INSERT INTO users (user_login, user_password) VALUES (?, ?)');
        $q->execute(array($login, $password));
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}