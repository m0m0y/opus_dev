<?php 

require_once "controller.db.php";
require_once "../model/model.early_learning.php";

$earlyLearning = new EarlyLearning();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {

    case "updateEarlyLeaningContent";
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $status = $_POST["status"];
        $earlyLearning = $earlyLearning->updateEarlyLearning($id, $title, $img, $content, $status);

        $response = array("message" => "Success Update");
        break;

    // case "updateEalyLearnCard";
    //     $card_id = $_POST["card_id"];
    //     $card_title = $_POST["card_title"];
    //     $content = $_POST["card_content"];
    //     $status = $_POST["card_status"];
    //     $earlyLearning = $earlyLearning->updateEarlyLearning($id, $title, $img,$content, $status);

    //     $response = array("message" => "Success Update");
    //     break;

        // -----------------------------------------------------------------------------------------------------------
        
        case "addEarly_learning_courses";
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];
        $classicalMusic = $classicalMusic->addEarly_learning_courses($course, $sort_by, $status);

        $response = array("message" => "Success Insert");
        break;

    case "updateEarly_learning_courses";
        $course_id = $_POST["course_id"];
        $course = $_POST["course"];
        $sort_by = $_POST["sort_by"];
        $status = $_POST["status"];  
        $classicalMusic = $classicalMusic->updateEarly_learning_courses($course_id, $course, $sort_by, $status);

        $response = array("message" => "Update Success");
        break;

    case "deleteEarly_learning_courses";
        $id = $_POST["id"];
        $$classicalMusic = $classicalMusic->deleteEarly_learning_courses($id);

        $response = array("message" => "Delete Success");
        break;

    default:
        header("Location: ../404.php");

}

echo json_encode($response);