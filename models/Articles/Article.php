<?php
class Article {
    
    // Décalaration des attributs
    private $_art_id;
    private $_art_title;
    private $_art_content;
    private $_art_author;
    private $_art_creation_date;
    private $_art_modified_date;

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
    public function art_id() {
        return $this->_art_id;
    }

    public function art_title() {
        return $this->_art_title;
    }

    public function art_content() {
        return $this->_art_content;
    }

    public function art_author() {
        return $this->_art_author;
    }

    // Déclaration des setters (mutateurs)
    public function setArt_id($art_id) {
        $art_id = (int) $art_id;
        if ($art_id > 0) {
            $this->_art_id = $art_id;
        }
    }

    public function setArt_title($art_title) {
        if (is_string($art_title)) {
            $this->_art_title = $art_title;
        } 
    }

    public function setArt_content($art_content) {
        if (is_string($art_content)) {
            $this->_art_content = $art_content;
        }
    }

    public function setArt_author($art_author) {
        if (is_string($art_author)) {
            $this->_art_author = $art_author;
        }
    }
}