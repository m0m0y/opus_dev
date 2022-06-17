<?php 

class HomePage extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function updateCards($card_id, $card_title, $card_content, $link, $status) {
        $card_title = str_replace(array("'", "&qout"), "", htmlspecialchars($card_title));
        $card_content = str_replace(array("'", "&qout"), "", htmlspecialchars($card_content));

        $query = $this->conn->prepare("UPDATE card_content SET card_title = ?, content = ?, link = ?, card_status = ? WHERE card_id = ?");
        $query->execute([$card_title, $card_content, $link, $status, $card_id]);
    }

    public function updateCardsWithUpload($card_id, $card_title, $img, $card_content, $link, $status) {
        $card_title = str_replace(array("'", "&qout"), "", htmlspecialchars($card_title));
        $card_content = str_replace(array("'", "&qout"), "", htmlspecialchars($card_content));

        $query = $this->conn->prepare("UPDATE card_content SET card_title = ?, img = ?, content = ?, link = ?, card_status = ? WHERE card_id = ?");
        $query->execute([$card_title, $img, $card_content, $link, $status, $card_id]);
    }

    public function getHero() {
        $query = $this->conn->prepare("SELECT * FROM hero_slider ORDER BY sort_by ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function updateHero($hero_id, $title, $link_title, $url, $sort_by, $status) {
        $title = str_replace(array("'", "&qout"), "", htmlspecialchars($title));
        $link_title = str_replace(array("'", "&qout"), "", htmlspecialchars($link_title));
        $img = 'assets/img/hero-tumbnail.jpg';

        $query = $this->conn->prepare("UPDATE hero_slider SET img = ?, title = ?, link_title = ?, link = ?, sort_by = ?, status = ? WHERE id = ?");
        $query->execute([$img, $title, $link_title, $url, $sort_by, $status, $hero_id]);
    }

    public function updateHeroWithUpload($hero_id, $img, $title, $link_title, $url, $sort_by, $status) {
        $title = str_replace(array("'", "&qout"), "", htmlspecialchars($title));
        $link_title = str_replace(array("'", "&qout"), "", htmlspecialchars($link_title));

        $query = $this->conn->prepare("UPDATE hero_slider SET img = ?, title = ?, link_title = ?, link = ?, sort_by = ?, status = ? WHERE id = ?");
        $query->execute([$img, $title, $link_title, $url, $sort_by, $status, $hero_id]);
    }

    public function addHeroImage($img, $title, $link_title, $url, $sort_by, $status) {
        $title = str_replace(array("'", "&qout"), "", htmlspecialchars($title));
        $link_title = str_replace(array("'", "&qout"), "", htmlspecialchars($link_title));

        $query = $this->conn->prepare("INSERT INTO hero_slider (img, title, link_title, link, sort_by, status) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$img, $title, $link_title, $url, $sort_by, $status]);
    }

    public function deleteHeroImage($id) {
        $query = $this->conn->prepare("DELETE FROM hero_slider WHERE id = ?");
        $query->execute([$id]);
    }

}