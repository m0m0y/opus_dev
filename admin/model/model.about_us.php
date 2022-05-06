<?php

class AboutUs extends db_conn_mysql {

    public function getContent() {
        $conn = $this->db_conn();  
        $query = $conn->prepare("SELECT * FROM about_us");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getContentWhere($about_id) {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM about_us WHERE id='$about_id'");
        $query->execute();
        $response = $query->fetch();

        return $response;
    }

    public function updateContent($about_id, $title, $about_content, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE about_us SET title='$title', content='$about_content', status='$status' WHERE id='$about_id'");
        $query->execute();
    }

}