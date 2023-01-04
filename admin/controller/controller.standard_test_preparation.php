<?php
require_once "controller.db.php";
require_once "../model/model.standard_test_preparation.php";

$standardTestPreparation = new StandardTestPreparation();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch ($mode) {

    case "updateContent";             
    
                if($_FILES['img']['name']!="") {
                    // update with img
                    $target_dir = "../assets/img/uploads/test-prep/";
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
                    
                    $standardTestPreparation = $standardTestPreparation->updateContent($id, $title, $file, $content, $status);
                    $response = array("message" => "Success Update");
                } else {
                    // update without img
                    $id = $_POST["id"];
                    $title = $_POST["title"];           
                    $content = $_POST["page_content"];
                    $status = $_POST["status"];

                    $img = $standardTestPreparation->getImg($id);
                    $file = $img[0];
                    
                    $standardTestPreparation = $standardTestPreparation->updateContent($id, $title, $file, $content, $status);
                    $response = array("message" => "Success Update");
                }
  
        break;
        
    default: 
        header("Location: ../404.php");

}
echo json_encode($response);
