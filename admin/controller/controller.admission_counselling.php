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
        $admission_counselling = $admission_counselling->updateContent($id, $title, $content, $status);

        $response = array("message" => "Success Update");
        break;

    case "updateCardContent";

        if (($_FILES["image"]["name"] != "")) {
            $card_id = $_POST["card_id"];
            $card_title = $_POST["card_title"];
            $card_content = $_POST["card_content"];
            $link = $_POST["link"];
            $page = $_POST["page"];
            $status = $_POST["status"];

            if($_FILES["image"]["type"] != "image/jpeg") {
                echo json_encode(array("message" => "Invalid file format"));
                echo '
                    <script>
                        window.localStorage.setItem("stat", "invalidFormat");
                        window.location.href = "../history_and_team.php";
                    </script>
                ';
                die();
            }

            $target_dir = "../assets/img/admission/";
            $file = $_FILES['image']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $attachfile = $filename.".".$ext;
            $temp_name = $_FILES['image']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;

            if (file_exists($path_filename_ext)) { 

                $response = array("message" => "The file you trying to upload is already exists");

            } else {

                if ($card_title == "" || $card_content == "" || $page == "") {

                    $response = array("message" => "Error Update");

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "error");
                            window.location.href = "../history_and_team.php";
                        </script>
                    ';

                } else {
                    
                    move_uploaded_file($temp_name,$path_filename_ext);

                    $admission_counselling = $admission_counselling->updateCardsWithUpload($card_id, $card_title, $path_filename_ext, $card_content, $link, $page, $status);
    
                    $response = array("message" => "Success Uploading Image");
    
                    // echo '
                    //     <script>
                    //         window.localStorage.setItem("stat", "success");
                    //         window.location.href = "../history_and_team.php";
                    //     </script>
                    // ';

                }

            }

        } else {

            $card_id = $_POST["card_id"];
            $card_title = $_POST["card_title"];
            $card_content = $_POST["card_content"];
            $link = $_POST["link"];
            $page = $_POST["page"];
            $status = $_POST["status"];

            if($card_title == "" || $card_content == "<br>" || $page == "") {

                $response = array("message" => "Error Update");

            } else {

                $admission_counselling = $admission_counselling->updateCards($card_id, $card_title, $card_content, $link, $page, $status);

                $response = array("message" => "Success Update Content");
                
            }

        }

        break;

    default:
        header("Location: ../admin/404.php");

}

echo json_encode($response);