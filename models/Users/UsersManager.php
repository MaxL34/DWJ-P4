<?php
class UsersManager {

    private $_db;
    public function __construct($db) {
        $this->setDb($db);
    }

    public function createUser($user, $password) {
        $q = $this->_db->prepare('INSERT INTO users (user_login, user_password) VALUES (:user_login, :user_password)');
        $q->execute(array(
            'user_login' => $user,
            'user_password' => password_hash($password, PASSWORD_DEFAULT)));
    }

    public function doesUserExist($user) {
        $q = $this->_db->prepare('SELECT user_login FROM users WHERE user_login = ?');
        $q->execute(array($user));
        $response = $q->fetchAll();
        $nbReponse = count($response);
        return $nbReponse;
    }

    public function logUser($login, $password) {
        $q = $this->_db->prepare('SELECT user_login, user_password FROM users WHERE user_login = ? AND user_password = ?');
        $q->execute(array($login, $password));
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}