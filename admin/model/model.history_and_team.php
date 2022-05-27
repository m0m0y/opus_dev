<?php

class HistoryAndTeams extends db_conn_mysql {

    public function getHistoryContent() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM history");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getHistoryContentWhere($id) {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM history WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateHistoryContent($id, $title, $page_content, $status) {
        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE history SET title = ?, content = ?, status = ? WHERE id = ?");
        $query->execute([$title, $page_content, $status, $id]);
    }

    public function getTeamList() {
        $conn = $this->db_conn();
        $query = $conn->prepare("SELECT * FROM team");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function updateTeamInfo($id, $name, $position, $introduction, $status) {
        $introduction = str_replace(array("'", "&qout"), "", htmlspecialchars($introduction));

        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE team SET name = ?, position = ?, introduction = ?, status = ? WHERE id = ?");
        $query->execute([$name, $position, $introduction, $status, $id]);
    }

    public function updateInfoWithUpload($id, $path_filename_ext, $name, $position, $introduction, $status) {
        $introduction = str_replace(array("'", "&qout"), "", htmlspecialchars($introduction));

        $conn = $this->db_conn();
        $query = $conn->prepare("UPDATE team SET img = ?, name = ?, position = ?, introduction = ?, status = ? WHERE id = ?");
        $query->execute([$path_filename_ext, $name, $position, $introduction, $status, $id]);
    }

}