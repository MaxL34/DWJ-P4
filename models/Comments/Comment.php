<?php
class Comment {
    
    // Décalaration des attributs
    private $_com_id;
    private $_com_content;
    private $_com_author;
    private $_article_id;
    private $_com_creation_date;
    private $_com_date_fr;
    private $_com_report_number;
    private $_com_report_date;

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
    public function com_id() {
        return $this->_com_id;
    }

    public function com_content() {
        return $this->_com_content;
    }

    public function com_author() {
        return $this->_com_author;
    }

    public function article_id() {
        return $this->_article_id;
    }

    public function com_report_date() {
        return $this->_com_report_date;
    }

    public function com_report_number() {
        return $this->_com_report_number;
    }

    public function com_creation_date() {
        return $this->_com_creation_date;
    }

    public function com_date_fr() {
        return $this->_com_date_fr;
    }

    // Déclaration des setters (mutateurs)
    public function setCom_id($com_id) {
        $com_id = (int) $com_id;
        if ($com_id > 0) {
            $this->_com_id = $com_id;
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

    public function setArticle_id($article_id) {
        $article_id = (int) $article_id;
        if ($article_id > 0) {
            $this->_article_id = $article_id;
        }
    }

    public function setCom_creation_date($com_creation_date) {
        $this->_com_creation_date = $com_creation_date;
    }

    public function setCom_date_fr($com_date_fr) {
        $this->_com_date_fr = $com_date_fr;
    }

    public function setCom_report_number($com_report_number) {
        $com_report_number = (int) $com_report_number;
        if ($com_report_number > 0) {
            $this->_com_report_number = $com_report_number;
        }
    } 

    public function setCom_report_date($com_report_date) {
        $this->_com_report_date = $com_report_date;
    }
}