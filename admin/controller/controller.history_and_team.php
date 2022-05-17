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

            if (strlen($v["introduction"]) > 45) {
                $strCut = substr($v["introduction"], 0, 30);
                $endPoint = strrpos($strCut, ' ');

                $shortIntro = $endPoint ? substr($strCut, 0, $endPoint).'...' : substr($strCut, 0);

                $historyAndTeams[$k]["introduction"] = $shortIntro;
            }

            $historyAndTeams[$k]["status"] =  ($v["status"] == 0 ? "Enabled" : "Disabled");

            $historyAndTeams[$k]["date_added"] = $v["date_added"];
            $historyAndTeams[$k]["action"] = '
                <center>
                    <button onclick="updateTeamsTable(\''.$v['id'].'\',\''.$v['img'].'\',\''.$v['name'].'\',\''.$v['position'].'\',\''.$v['status'].'\',\''.$v['date_added'].'\',\''.$v['date_update'].'\')" class="btn btn-sm btn-info btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
                        <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                        <span class="text">Update</span>
                    </button>
                </center>
            ';
        }

        $response = array("data" => $historyAndTeams);
        break;

    case "updateTeamInfo";
        if (($_FILES["image"]["name"] != "")){
            $id = $_POST["id"];
            $name = $_POST["name"];
            $position = $_POST["position"];
            $introduction = $_POST["introduction"];
            $status = $_POST["status"];

            $target_dir = "../assets/img/teams/";
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
                move_uploaded_file($temp_name,$path_filename_ext);

                $historyAndTeams = $historyAndTeams->updateTeamInfo($id, $path_filename_ext, $name, $position, $introduction, $status);

                $response = array("message" => "Success Update");
            }
        }
        
        break;


    default:
        header("Location: ../admin/404.php");

}

echo json_encode($response);