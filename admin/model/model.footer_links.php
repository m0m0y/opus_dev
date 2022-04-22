<?php 

class FooterLinks extends db_conn_mysql {

    public function getFooterLinks($label) {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM footer_links WHERE label='$label' ORDER BY sort ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function updateLinks($link_id, $title, $url, $sort, $label, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE footer_links SET title='$title', url='$url', sort='$sort', label='$label', status='$status' WHERE id='$link_id'");
        $query->execute();
    }

}