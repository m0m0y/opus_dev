<?php

require_once "controller.db.php";
require_once "../model/model.classical_music.php";

$classicalMusic = new ClassicalMusic();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) { 

    case "updateClassicalMusic";
    if($_FILES['img']['name']!="") {
        // update with img
        $target_dir = "../assets/img/uploads/classical-music/";
        $file = $_FILES['img']['name'];
        $path = pathinfo($file);
        $ext = $path['extension'];
        $temp_name = $_FILES['img']['tmp_name'];
        $path_filename_ext = $target_dir.$file;

        $id = $_POST["id"];
        $title = $_POST["title"];           
        $content = $_POST["page_content"];
        $status = $_POST["status"];

        move_uploaded_file($temp_name,$path_filename_ext);
        
        $classicalMusic = $classicalMusic->updateContent($id, $title,$file, $content, $status);
        $response = array("message" => "Success Update");
        break;
    }
    case "addCourse";
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];
        $classicalMusic = $classicalMusic->addCourse($course, $sort_by, $status);

        $response = array("message" => "Success Insert");
        break;

    case "updateCourse";
        $course_id = $_POST["course_id"];
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];  
        $classicalMusic = $classicalMusic->updateCourse($course_id, $course, $sort_by, $status);

        $response = array("message" => "Update Success");
        break;

    case "deleteCourse";
        $id = $_POST["id"];
        $$classicalMusic = $classicalMusic->deleteCourse($id);

        $response = array("message" => "Delete Success");
        break;
// --------------------------------------------------------------------------------------------------------------------------------------------------

        case "addOpportunities";
        $title = $_POST["title"];
        $content = $_POST["content"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];
        $classicalMusic = $classicalMusic->addOpportunities($title, $content,$sort_by, $status);

        $response = array("message" => "Success Insert");
        break;

    case "updateOpportunities";
        $opportunity_id = $_POST["opportunity_id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];     
        $classicalMusic = $classicalMusic->updateOpportunities($opportunity_id, $title, $content,$sort_by, $status);
        $response = array("message" => "Update Success");
        break;

    case "deleteOpportunities";
        $id = $_POST["id"];
        $$classicalMusic = $classicalMusic->deleteOpportunities($id);

        $response = array("message" => "Delete Success");
        break;


default: 
header("Location: ../404.php");

}
echo json_encode($response);
    