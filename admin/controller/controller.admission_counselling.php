<?php
require_once "controller.db.php";
require_once "../model/model.admission_counselling.php";

$admission_counselling = new AdmissionCounselling();

$mode = isset($_GET["mode"]) ?  $_GET["mode"] : NULL;

switch($mode) {

    case "tableDetail";
        $contact_info = $contact_info->getInformation();
        foreach($contact_info as $k=>$v) {
            $contact_info[$k]["title"] = $v["title"];
            $contact_info[$k]["description"] = $v["description"];
            $contact_info[$k]["contact_info_status"] = $v["contact_info_status"];
            $contact_info[$k]["action"] = '
            <center><button onclick="update(\''.$v['id'].'\',\''.$v['title'].'\',\''.$v['description'].'\',\''.$v['contact_info_status'].'\')" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Update</button></center>
            ';
        }
        $response = array("data" => $contact_info);
        break;

        
    case "updateDesc";
        $id = $_POST["info_id"];
        $description = $_POST["desc"];
        $status = $_POST["status"];
        $contact_info = $contact_info->updateInformation($id, $description, $status);

        $response = array("message" => "Success Update");
        header('location: ../contact_info.php');
        break;


    default:
        echo "404";

}