<?php

class AdmissionCounselling extends db_conn_mysql {

    public function getContent() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM admission_counselling");
        $query->execute();
        $response = $query->fetchAll();
        
        return $response;
    }

    public function getContentWhere($admission_id) {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM admission_counselling WHERE admission_id = ?");
        $query->execute([$admission_id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateContent($id, $title, $content, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE admission_counselling SET title = ?, content = ?, status = ? WHERE admission_id = ?");
        $query->execute([$title, $content, $status, $id]);
    }
}   