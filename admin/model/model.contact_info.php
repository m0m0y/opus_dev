<?php

class ContactInfo extends db_conn_mysql {

    public function getInformation() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM contact_info");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function updateInformation($id, $description, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE contact_info SET description = ?, contact_info_status = ? WHERE id = ?");
        $query->execute($description, $status, $id);
    }

}