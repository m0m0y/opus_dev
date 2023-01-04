<?php

class StandardTestPreparation extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function getContent() {
        $query = $this->conn->prepare("SELECT * FROM standardized_test_preparation");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }
    
    public function getCardContent() {
        $query = $this->conn->prepare("SELECT * FROM test_prep_card");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getContentWhere($test_preparation_id) {
        $query = $this->conn->prepare("SELECT * FROM standardized_test_preparation WHERE id = ?");
        $query->execute([$test_preparation_id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateContent($id, $title, $img, $content,  $status) {
      
        $query = $this->conn->prepare("UPDATE standardized_test_preparation SET title = ?, img = ?, content = ?, status = ? WHERE id = ?");
        $query->execute([$title, $img, $content, $status, $id]);

    }

    function getImg($id) {

        $query = $this->conn->prepare("SELECT img FROM standardized_test_preparation WHERE id=?");
        $query->execute([$id]);
        $return = $query->fetch();

        return $return;

    }

} 