<?php 

class ClassicalMusic extends db_conn_mysql {

    public function __construct() {
        $this->conn = $this->db_conn();
    }

    public function getContent() {
        $query = $this->conn->prepare("SELECT * FROM classical_music");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }

    public function getContentWhere($id) {
        $query = $this->conn->prepare("SELECT * FROM classical_music WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function updateContent($id, $title, $img, $content,$status) {
        $query = $this->conn->prepare("UPDATE classical_music SET title = ?, img = ?, content = ?, status = ? WHERE id = ?");
        $query->execute([$title, $img, $content, $status, $id]);
    }
    
    public function getImg($id) {
        $query = $this->conn->prepare("SELECT img FROM standardized_test_preparation WHERE id=?");
        $query->execute([$id]);
        $return = $query->fetch();

        return $return;
    }
    // -------------------------------------------------------------------------------------
    public function getCourses() {
        $query = $this->conn->prepare("SELECT * FROM classical_courses ORDER BY sort ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }
    public function getCoursesWhere($id) {
        $query = $this->conn->prepare("SELECT * FROM classical_courses WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function addCourse($course, $sort_by, $status) {
        $query = $this->conn->prepare("INSERT INTO classical_courses (course, sort, status) VALUES (?, ?, ?)");
        $query->execute([$course, $sort_by, $status]);
    }

    public function updateCourse($course_id, $course, $sort_by, $status) {
        $query = $this->conn->prepare("UPDATE classical_courses SET course = ?, sort = ?, status = ? WHERE id = ?");
        $query->execute([$course, $sort_by, $status, $course_id]);
    }

    public function deleteCourse($id) {
        $query = $this->conn->prepare("DELETE FROM classical_courses WHERE id = ?");
        $query->execute([$id]);
    }
    // -------------------------------------------------------------------------------------
    public function getClassical_opportunities() {
        $query = $this->conn->prepare("SELECT * FROM classical_opportunities ORDER BY sort ASC");
        $query->execute();
        $response = $query->fetchAll();

        return $response;
    }
    
    public function getClassical_opportunitiesWhere($id) {
        $query = $this->conn->prepare("SELECT * FROM classical_opportunities WHERE id = ?");
        $query->execute([$id]);
        $response = $query->fetch();

        return $response;
    }

    public function addOpportunities($title, $content,$sort_by, $status) {
        $query = $this->conn->prepare("INSERT INTO classical_opportunities(title, content, sort, status) VALUES (?, ?, ?,?)");
        $query->execute([$title, $content,$sort_by, $status]);
    }

    public function updateOpportunities($opportunity_id, $title, $content,$sort_by, $status) {
        $query = $this->conn->prepare("UPDATE  classical_opportunities SET title = ?, content = ?, sort = ?, status = ? WHERE id = ?");
        $query->execute([$title, $content,$sort_by, $status, $opportunity_id]);
    }

    public function deleteOpportunities($id) {
        $query = $this->conn->prepare("DELETE FROM classical_opportunities WHERE id = ?");
        $query->execute([$id]);
    }
    // -------------------------------------------------------------------------------------




}