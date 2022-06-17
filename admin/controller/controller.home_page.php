<?php
require_once "controller.db.php";
require_once "../model/model.home_page.php";
require_once "../model/model.card.php";
require_once "../model/model.home_page.php";

$cardContent = new Cards();
$homePage = new HomePage();

$mode = isset($_GET["mode"]) ? $_GET["mode"] : NULL;

switch($mode) {

    case "cardDatalist";
        $page = "home.php";
        $cardContent = $cardContent->getContentWhere($page);
        foreach($cardContent as $k=>$v) {
            $cardContent[$k]["card_title"] = $v["card_title"];

            if(strlen($v["content"]) > 50) {
                $new_content = substr($v["content"], 0 , 100) . ' ...';
                $cardContent[$k]["content"] = html_entity_decode($new_content);
            }

            ($v["card_status"] == 0 ?  $cardContent[$k]["card_status"] = "Enabled" : $cardContent[$k]["card_status"] = "Disabled");

            $cardContent[$k]["date_update"] = $v["date_update"];
            $cardContent[$k]["action"] = '
            <center>
                <button onclick="update(\''.$v['card_id'].'\',\''.$v['card_title'].'\',\''.$v['img'].'\',\''.$v['content'].'\',\''.$v['link'].'\',\''.$v['card_status'].'\')" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                    <span class="text">Update</span>
                </button>
            </center>
            ';
        }

        $response = array("data" => $cardContent);
        break;

    case "updateCardContent";

        if (($_FILES["image"]["name"] != "")) {
            $card_id = $_POST["card_id"];
            $card_title = $_POST["card_title"];
            $card_content = $_POST["card_content"];
            $link = $_POST["link"];
            $status = $_POST["status"];

            if($_FILES["image"]["type"] != "image/jpeg") {
                echo json_encode(array("message" => "Invalid file format"));
                echo '
                    <script>
                        window.localStorage.setItem("stat", "invalidFormat");
                        window.location.href = "../home_page.php";
                    </script>
                ';
                die();
            }

            $target_dir = "../assets/img/home_page/";
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
                        window.location.href = "../home_page.php";
                    </script>
                ';

            } else {

                if ($card_title == "" || $card_content == "") {

                    $response = array("message" => "Error Update");

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "error");
                            window.location.href = "../home_page.php";
                        </script>
                    ';

                } else {
                    
                    move_uploaded_file($temp_name,$path_filename_ext);

                    $path_filename_ext = explode("../", $path_filename_ext);
                    $img = "../admin/". $path_filename_ext[1];

                    $homePage = $homePage->updateCardsWithUpload($card_id, $card_title, $img, $card_content, $link, $status);
    
                    $response = array("message" => "Success Uploading Image");
    
                    echo '
                        <script>
                            window.localStorage.setItem("stat", "success");
                            window.location.href = "../home_page.php";
                        </script>
                    ';

                }

            }

        } else {

            $card_id = $_POST["card_id"];
            $card_title = $_POST["card_title"];
            $card_content = $_POST["card_content"];
            $link = $_POST["link"];
            $status = $_POST["status"];

            if($card_title == "" || $card_content == "<br>") {

                $response = array("message" => "Error Update");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "error");
                        window.location.href = "../home_page.php";
                    </script>
                ';

            } else {

                $homePage = $homePage->updateCards($card_id, $card_title, $card_content, $link, $status);

                $response = array("message" => "Success Update Content");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "success");
                        window.location.href = "../home_page.php";
                    </script>
                ';
                
            }

        }

        break;

    case "heroDatalist";
        $homePage = $homePage->getHero();
        foreach($homePage as $k=>$v) {
            $homePage[$k]["img"] = '<center><img src="'.$v["img"].'" width="100%"></center>';
            $homePage[$k]["title"] = $v["title"];
            $homePage[$k]["link"] = $v["link"];
            $homePage[$k]["sort_by"] = $v["sort_by"];
            ($v["status"] == 0 ?  $homePage[$k]["status"] = "Enabled" : $homePage[$k]["status"] = "Disabled");
            $homePage[$k]["date_update"] = $v["date_update"];

            $homePage[$k]["action"] = '
            <center>
                <button onclick="updateHero(\''.$v['id'].'\',\''.$v['img'].'\',\''.$v['title'].'\',\''.$v['link_title'].'\',\''.$v['link'].'\',\''.$v['sort_by'].'\',\''.$v['status'].'\')" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                    <span class="text">Update</span>
                </button>
                
                <button onclick="deleteHero(\''.$v['id'].'\')" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon"><i class="fas fa-trash"></i></span>
                    <span class="text">Delete</span>
                </button>
            </center>
            ';
        }

        $response = array("data" => $homePage);
        break;

        case "addHeroImg";

            if (($_FILES["image"]["name"] != "")) {

                $title = $_POST["title"];
                $link_title = $_POST["link_title"];
                $url = $_POST["url"];
                $sort_by = $_POST["sort_by"];
                $status = $_POST["status"];

                if($_FILES["image"]["type"] != "image/jpeg") {
                    echo json_encode(array("message" => "Invalid file format"));
                    echo '
                        <script>
                            window.localStorage.setItem("stat", "invalidFormat");
                            window.location.href = "../home_page.php";
                        </script>
                    ';
                    die();
                }

                $target_dir = "../assets/img/hero/";
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
                            
                        </script>
                    ';

                } else {

                    if ($title == "" || $file == "") {

                        $response = array("message" => "Error Update");

                        echo '
                            <script>
                                window.localStorage.setItem("stat", "error");
                                window.location.href = "../home_page.php";
                            </script>
                        ';

                    } else {
                        
                        move_uploaded_file($temp_name,$path_filename_ext);

                        $path_filename_ext = explode("../", $path_filename_ext);
                        $img = "../admin/". $path_filename_ext[1];

                        $homePage = $homePage->addHeroImage($img, $title, $link_title, $url, $sort_by, $status);
        
                        $response = array("message" => "Success Uploading Image");
        
                        echo '
                            <script>
                                window.localStorage.setItem("stat", "success");
                                window.location.href = "../home_page.php";
                            </script>
                        ';

                    }

                }

            }  else {

                $title = $_POST["title"];
                $link_title = $_POST["link_title"];
                $url = $_POST["url"];
                $sort_by = $_POST["sort_by"];
                $status = $_POST["status"];

                if ($title == "") {

                    $response = array("message" => "Error Update");

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "error");
                            window.location.href = "../home_page.php";
                        </script>
                    ';

                } else {
                    $img = "";
                    $homePage = $homePage->addHeroImage($img, $title, $link_title, $url, $sort_by, $status);

                    $response = array("message" => "Success Update Content");

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "success");
                            window.location.href = "../home_page.php";
                        </script>
                    ';
                    
                }

            }

            break;

    case "updateHeroImg";

        if (($_FILES["image"]["name"] != "")) {

            $hero_id = $_POST["hero_id"];
            $title = $_POST["title"];
            $link_title = $_POST["link_title"];
            $url = $_POST["url"];
            $sort_by = $_POST["sort_by"];
            $status = $_POST["status"];

            if($_FILES["image"]["type"] != "image/jpeg") {
                echo json_encode(array("message" => "Invalid file format"));
                echo '
                    <script>
                        window.localStorage.setItem("stat", "invalidFormat");
                        window.location.href = "../home_page.php";
                    </script>
                ';
                die();
            }

            $target_dir = "../assets/img/hero/";
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
                        
                    </script>
                ';

            } else {

                if ($title == "" || $file == "") {

                    $response = array("message" => "Error Update");

                    echo '
                        <script>
                            window.localStorage.setItem("stat", "error");
                            window.location.href = "../home_page.php";
                        </script>
                    ';

                } else {
                    
                    move_uploaded_file($temp_name,$path_filename_ext);

                    $path_filename_ext = explode("../", $path_filename_ext);
                    $img = "../admin/". $path_filename_ext[1];

                    $homePage = $homePage->updateHeroWithUpload($hero_id, $img, $title, $link_title, $url, $sort_by, $status);
    
                    $response = array("message" => "Success Uploading Image");
    
                    echo '
                        <script>
                            window.localStorage.setItem("stat", "success");
                            window.location.href = "../home_page.php";
                        </script>
                    ';

                }

            }

        } else {

            $hero_id = $_POST["hero_id"];
            $title = $_POST["title"];
            $link_title = $_POST["link_title"];
            $url = $_POST["url"];
            $sort_by = $_POST["sort_by"];
            $status = $_POST["status"];

            if ($title == "") {

                $response = array("message" => "Error Update");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "error");
                        window.location.href = "../home_page.php";
                    </script>
                ';

            } else {

                $homePage = $homePage->updateHero($hero_id, $title, $link_title, $url, $sort_by, $status);

                $response = array("message" => "Success Update Content");

                echo '
                    <script>
                        window.localStorage.setItem("stat", "success");
                        window.location.href = "../home_page.php";
                    </script>
                ';
                
            }

        }
        
        break;

        case "deleteHeroImg";
            $id = $_POST["id"];
            $homePage = $homePage->deleteHeroImage($id);

            $response = array("message" => "Delete Success");
            break;

    default:
        header("Location: ../admin/404.php");

}

echo json_encode($response);