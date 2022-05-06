<?php

class Cards extends db_conn_mysql {

    public function getContent() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM card_content");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function updateContent($card_id, $section, $card_title, $card_content, $link, $page, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE card_content SET section='$section', card_title='$card_title', content='$card_content', link='$link', page='$page', card_status='$status' WHERE card_id='$card_id'");
        $query->execute();
    }

}