<?php 

class CommunicationArts extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();  
    }
                               
    public function getContent() {
        $query = $this->conn->prepare("SELECT * FROM communication_arts");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getContentWhere($id) {
        $query = $this->conn->prepare("SELECT * FROM communication_arts WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateContent($id, $title,$img,$content, $status) {
        $query = $this->conn->prepare("UPDATE communication_arts SET title = ?, img =? ,content = ?, status = ? WHERE id = ?");
        $query->execute([$title, $img, $content, $status, $id]);
    }

    public function getCourses() {
        $query = $this->conn->prepare("SELECT * FROM our_courses ORDER BY sort ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function addCourse($course, $sort_by, $status) {
        $query = $this->conn->prepare("INSERT INTO our_courses (course, sort, status) VALUES (?, ?, ?)");
        $query->execute([$course, $sort_by, $status]);
    }

    public function updateCourse($course_id, $course, $sort_by, $status) {
        $query = $this->conn->prepare("UPDATE our_courses SET course = ?, sort = ?, status = ? WHERE id = ?");
        $query->execute([$course, $sort_by, $status, $course_id]);
    }

    public function deleteCourse($id) {
        $query = $this->conn->prepare("DELETE FROM our_courses WHERE id = ?");
        $query->execute([$id]);
    }
// --------------------------------Communication_curricula--------------------------------------
public function getCurricula() {
    $query = $this->conn->prepare("SELECT * FROM communication_curricula ORDER BY sort ASC");
    $query->execute();
    $response = $query->fetchAll();

    return $response;
}

public function addCurricula($course, $sort_by, $status) {
    $query = $this->conn->prepare("INSERT INTO communication_curricula (course, sort, status) VALUES (?, ?, ?)");
    $query->execute([$course, $sort_by, $status]);
}

public function updateCurricula($course_id, $course, $sort_by, $status) {
    $query = $this->conn->prepare("UPDATE communication_curricula SET course = ?, sort = ?, status = ? WHERE id = ?");
    $query->execute([$course, $sort_by, $status, $course_id]);
}

public function deleteCurricula($id) {
    $query = $this->conn->prepare("DELETE FROM communication_curricula WHERE id = ?");
    $query->execute([$id]);
}
}