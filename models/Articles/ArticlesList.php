<?php
class ArticlesList {
    
    // Décalaration des attributs
    private $_art_id;
    private $_art_title;
    private $_art_content;
    private $_art_author;

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
}