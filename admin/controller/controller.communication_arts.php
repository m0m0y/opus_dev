<?php

require_once "controller.db.php";
require_once "../model/model.communication_arts.php";

$communicationArts = new CommunicationArts();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) { 
    case "updateContent";
    if($_FILES['img']['name']!="") {
        // update with img
        $target_dir = "../assets/img/uploads/communication-arts/";
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
        
        $communicationArts = $communicationArts->updateContent($id, $title,$file,$content, $status);
        $response = array("message" => "Success Update");
        break;
    }

    case "addCourse";
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];
        $communicationArts = $communicationArts->addCourse($course, $sort_by, $status);

        $response = array("message" => "Success Insert");
        break;

    case "updateCourse";
        $course_id = $_POST["course_id"];
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];  
        $communicationArts = $communicationArts->updateCourse($course_id, $course, $sort_by, $status);

        $response = array("message" => "Update Success");
        break;

    case "deleteCourse";
        $id = $_POST["id"];
        $communicationArts = $communicationArts->deleteCourse($id);

        $response = array("message" => "Delete Success");
        break;

    //     case "addCourse";
    //     $course = $_POST["course"];
    //     $sort_by = $_POST["sort_by"];
    //     $status = $_POST["status"];
    //     $communicationArts = $communicationArts->addCourse($course, $sort_by, $status);

    //     $response = array("message" => "Success Insert");
    //     break;

    // case "updateCourse";
    //     $course_id = $_POST["course_id"];
    //     $course = $_POST["course"];
    //     $sort_by = $_POST["sort_by"];
    //     $status = $_POST["status"];  
    //     $communicationArts = $communicationArts->updateCourse($course_id, $course, $sort_by, $status);

    //     $response = array("message" => "Update Success");
    //     break;

    // case "deleteCourse";
    //     $id = $_POST["id"];
    //     $communicationArts = $communicationArts->deleteCourse($id);

    //     $response = array("message" => "Delete Success");
    //     break;
        // --------------------------------Communication_curricula--------------------------------------
        case "             ";
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];
        $communicationArts = $communicationArts->addCurricula($course, $sort_by, $status);

        $response = array("message" => "Success Insert");
        break;

    case "updateCurricula";
        $course_id = $_POST["course_id"];
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];  
        $communicationArts = $communicationArts->updateCurricula($course_id, $course, $sort_by, $status);

        $response = array("message" => "Update Success");
        break;

    case "deleteCurricula";
        $id = $_POST["id"];
        $communicationArts = $communicationArts->deleteCurricula($id);

        $response = array("message" => "Delete Success");
        break;
 
    default;
        header("Location: ../404.php");

}
echo json_encode($response);