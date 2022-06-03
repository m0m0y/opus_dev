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
        $earlyLearning = $earlyLearning->updateEarlyLearning($id, $title, $content, $status);

        $response = array("message" => "Success Update");
        break;

    case "updateEalyLearnCard";
        $card_id = $_POST["card_id"];
        $card_title = $_POST["card_title"];
        $content = $_POST["card_content"];
        $status = $_POST["card_status"];
        $earlyLearning = $earlyLearning->updateEarlyLearningCard($card_id, $card_title, $content, $status);

        $response = array("message" => "Success Update");
        break;


    default:
        header("Location: ../admin/404.php");

}

echo json_encode($response);