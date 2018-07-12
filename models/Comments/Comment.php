<?php
class Comment {
    
    // Décalaration des attributs
    private $_com_id;
    private $_com_title;
    private $_com_content;
    private $_com_author;

    // Hydratation
    public function hydrate(array $data) {
        for each ($data as $key => $value) {
            $method = 'set'.ucfirst($key)

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Déclaration des getters (accesseurs)
    public function com_id() {
        return $this->_com_id;
    }

    public function com_title() {
        return $this->_com_title;
    }

    public function com_content() {
        return $this->_com_content;
    }

    public function com_author() {
        return $this->_com_author;
    }

    // Déclaration des setters (mutateurs)
    public function setCom_id($com_id) {
        $com_id = (int) $com_id;
        if ($com_id > 0) {
            $this->_com_id = $com_id;
        }
    }

    public function setCom_title($com_title) {
        if (is_string($com_title)) {
            $this->_com_title = $com_title;
        } 
    }

    public function setCom_content($com_content) {
        if (is_string($com_content)) {
            $this->_com_content = $com_content;
        }
    }

    public function setCom_author($com_author) {
        if (is_string($com_author)) {
            $this->_com_author = $com_author;
        }
    }
}