<?php
require_once "controller.db.php";
require_once "../model/model.admission_counselling.php";

$admission_counselling = new AdmissionCounselling();

$mode = isset($_GET["mode"]) ?  $_GET["mode"] : NULL;

switch($mode) {

    case "updateContent";
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $status = $_POST["status"];
        $card_id = $_POST["card_id"];
        $card_title = $_POST["card_title"];
        $card_content = $_POST["card_content"];
        $admission_counselling = $admission_counselling->updateContent($id, $title, $content, $status, $card_id, $card_title, $card_content);

        $response = array("message" => "Success Update");
        break;

    case "cardTableDetail";
        $admission_counselling = $admission_counselling->getContentCard();
        foreach($admission_counselling as $k => $v) {
            $admission_counselling[$k]['section'] = $v['section'];
            $admission_counselling[$k]['title'] = $v['title'];
            $admission_counselling[$k]['content'] = $v['content'];
            $admission_counselling[$k]['status'] = $v['status'];
            $admission_counselling[$k]['date_updated'] = $v['date_updated'];
            $admission_counselling[$k]['action'] = '<button onclick="update(\''.$v['card_id'].'\',\''.$v['title'].'\',\''.$v['content'].'\',\''.$v['link'].'\',\''.$v['page'].'\',\''.$v['status'].'\')" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Update</button>';
        }
        break;

    default:
        header("Location: ../admin/404.php");

}