<?php 

class EarlyLearning extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }

    public function getEarlyLearningContent() {
        $query = $this->conn->prepare("SELECT * FROM early_learning");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getEarlyLearningWhere($early_learn_id) {
        $query = $this->conn->prepare("SELECT * FROM early_learning WHERE id = ?");
        $query->execute([$early_learn_id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateEarlyLearning($id, $title, $img,$content, $status) {
        $query = $this->conn->prepare("UPDATE early_learning SET title = ?, content = ?, img = ?, status = ? WHERE id = ?");
        $query->execute([$id, $title, $img,$content, $status]);
    }
    public function getImg($id) {
        $query = $this->conn->prepare("SELECT img FROM early_learning WHERE id=?");
        $query->execute([$id]);
        $return = $query->fetch();

        return $return;
    }

    // public function updateEarlyLearningCard($card_id, $card_title, $content, $status) {
    //     $card_title = str_replace(array("'", "&qout"), "", htmlspecialchars($card_title));
    //     $content = str_replace(array("'", "&qout"), "", htmlspecialchars($content));

    //     $query = $this->conn->prepare("UPDATE card_content SET card_title = ?, content = ?, card_status = ? WHERE card_id = ? ");
    //     $query->execute([$card_title, $content, $status, $card_id]);
    // }
    // ----------------------------------------------------------------------------------------------------------------------------------
    public function getEarly_learning_courses() {
        $query = $this->conn->prepare("SELECT * FROM early_learning_courses ORDER BY sort ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }
    public function getEarly_learning_coursesWhere($id) {
        $query = $this->conn->prepare("SELECT * FROM early_learning_courses WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function addEarly_learning_courses($course, $sort_by, $status) {
        $query = $this->conn->prepare("INSERT INTO early_learning_courses (course, sort, status) VALUES (?, ?, ?)");
        $query->execute([$course, $sort_by, $status]);
    }

    public function updateEarly_learning_courses($course_id, $course, $sort_by, $status) {
        $query = $this->conn->prepare("UPDATE early_learning_courses SET course = ?, sort = ?, status = ? WHERE id = ?");
        $query->execute([$course, $sort_by, $status, $course_id]);
    }

    public function deleteEarly_learning_courses($id) {
        $query = $this->conn->prepare("DELETE FROM early_learning_courses WHERE id = ?");
        $query->execute([$id]);
    }
        // ----------------------------------------------------------------------------------------------------------------------------------
}