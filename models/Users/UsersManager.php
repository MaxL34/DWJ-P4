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
        if ($response = $q->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
          }
    }

    public function logUser($user, $password) {
        $q = $this->_db->prepare('SELECT user_login, user_password FROM users WHERE user_login = :user_login');
        $q->execute(array(
            'user_login' => $user));
        $response = $q->fetch(PDO::FETCH_ASSOC);
        $validPassword = password_verify($password, $response['user_password']);
        return $validPassword;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}