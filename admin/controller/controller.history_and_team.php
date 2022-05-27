<?php 

require_once "controller.db.php";
require_once "../model/model.history_and_team.php";

$historyAndTeams = new HistoryAndTeams();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {

    case "updateHistoryContent";
        $id = $_POST["id"];
        $title = $_POST["title"];
        $page_content = $_POST["page_content"];
        $status = $_POST["status"];
        $historyAndTeams = $historyAndTeams->updateHistoryContent($id, $title, $page_content, $status);

        $response = array("message" => "Success Update");
        break;

    case "listTeams";
        $historyAndTeams = $historyAndTeams->getTeamList();
        foreach ($historyAndTeams as $k=>$v) {
            $historyAndTeams[$k]["name"] = $v["name"];
            $historyAndTeams[$k]["position"] = $v["position"];

            $historyAndTeams[$k]["status"] =  ($v["status"] == 0 ? "Enabled" : "Disabled");

            $historyAndTeams[$k]["date_added"] = $v["date_added"];
            $historyAndTeams[$k]["action"] = '
                <center>
                    <button onclick="updateTeamsTable(\''.$v['id'].'\',\''.$v['img'].'\',\''.$v['name'].'\',\''.$v['position'].'\',\''.$v["introduction"].'\',\''.$v['status'].'\')" class="btn btn-sm btn-info btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
                        <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                        <span class="text">Update</span>
                    </button>
                </center>
            ';
        }

        $response = array("data" => $historyAndTeams);
        break;

    case "updateTeamInfo";

        if (($_FILES["image"]["name"] != "")) {
            
            $id = $_POST["id"];
            $name = $_POST["name"];
            $position = $_POST["position"];
            $introduction = $_POST["introduction"];
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

            $target_dir = "../assets/img/team/";
            $file = $_FILES['image']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $attachfile = $filename.".".$ext;
            $temp_name = $_FILES['image']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;

            if (file_exists($path_filename_ext)) {

                $response = array("message" => "The file you trying to upload is already exists");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "errorUpload");
                        window.location.href = "../history_and_team.php";
                    </script>
                ';

            } else {

                if ($name == "" || $position == "" || $introduction == "") {

                    $response = array("message" => $introduction);

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "error");
                            window.location.href = "../history_and_team.php";
                        </script>
                    ';

                } else {
                    
                    move_uploaded_file($temp_name,$path_filename_ext);

                    $historyAndTeams = $historyAndTeams->updateInfoWithUpload($id, $path_filename_ext, $name, $position, $introduction, $status);
    
                    $response = array("message" => "Success Uploading Image");
    
                    echo '
                        <script>
                            window.localStorage.setItem("stat", "success");
                            window.location.href = "../history_and_team.php";
                        </script>
                    ';

                }
                
            }

        } else {

            $id = $_POST["id"];
            $name = $_POST["name"];
            $position = $_POST["position"];
            $introduction = $_POST["introduction"];
            $status = $_POST["status"];

            if ($name == "" || $position == "" || $introduction == "<br>") {

                $response = array("message" => "Error Update");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "error");
                        window.location.href = "../history_and_team.php";
                    </script>
                ';

            } else {
                
                $historyAndTeams = $historyAndTeams->updateTeamInfo($id, $name, $position, $introduction, $status);
        
                $response = array("message" => "Success Update Info");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "success");
                        window.location.href = "../history_and_team.php";
                    </script>
                ';
                
            }

        }
        break;


    default:
        header("Location: ../admin/404.php");

}

echo json_encode($response);