<?php
class User {
    
    // Déclaration des attributs
    private $_user_id;
    private $_user_login;
    private $_user_password;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Déclaration des getters (accesseurs)
    public function user_id() {
        return $this->_user_id;
    }

    public function user_login() {
        return $this->_user_login;
    }

    public function user_password() {
        return $this->_user_password;
    }

    // Déclaration des setters (mutateurs)
    public function setUser_id($user_id) {
        $user_id = (int) $user_id;
        if ($user_id > 0) {
            $this->_user_id = $user_id;
        }
    }

    public function setUser_login($user_login) {
        $user_login = (int) $user_login;
        if (is_string($user_login)) {
            $this->_user_login = $user_login;
        }
    }

    public function setUser_password($user_password) {
        $user_password = (int) $user_password;
        if (is_string($user_password)) {
            $this->_user_password = $user_password;
        }
    }
}