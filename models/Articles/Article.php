<?php
class Article {
    
    // Décalaration des attributs
    private $_art_id;
    private $_art_title;
    private $_art_content;
    private $_art_author;
    private $_art_creation_date;
    private $_date_fr;
    private $_modified_date_fr;
    private $_art_modified_date;

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

    public function art_creation_date() {
        return $this->_art_creation_date;
    }

    public function date_fr() {
        return $this->_date_fr;
    }

    public function modified_date_fr() {
        return $this->_modified_date_fr;
    }

    public function art_modified_date() {
        return $this->_art_modified_date;
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

    public function setArt_creation_date($art_creation_date) {
        $this->_art_creation_date = $art_creation_date;
    }

    public function setDate_fr($date_fr) {
        $this->_date_fr = $date_fr;
    }

    public function setModified_date_fr($modified_date_fr) {
        $this->_modified_date_fr = $modified_date_fr;
    }

    public function setArt_modified_date($art_modified_date) {
        $this->_art_modified_date = $art_modified_date;
    }
}