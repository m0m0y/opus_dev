<?php
$title = "Opus - Admission Counselling";
require_once "assets/common/header.php";
require_once "controller/controller.auth.php";
require_once "controller/controller.db.php";
require_once "model/model.admission_counselling.php";

$auth = new Auth();
$admission_counselling = new AdmissionCounselling();

$isLoggedIn = $auth->getSession("auth");
$auth->redirect("auth", true, "index.php");
$user = $auth->getSession("name");
?>

<link rel="stylesheet" type="text/css" href="lib/summernote/summernote-bs4.css">
<script type="text/javascript" charset="utf8" src="lib/summernote/summernote-bs4.min.js"></script>

<body id="page-top">

    <div id="wrapper">
        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php require_once "assets/common/top_bar.php"; ?>

                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Admission Counselling Page</h1>
                        <?php
                            if(isset($_GET["update"])){
                                $admission_id = $_GET["update"];
                                echo $admission_counselling->getContentWhere($admission_id);
                            } else {
                                echo $admission_counselling->getContent();
                            }
                        ?>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <div id="preloader" style="display: none;"></div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "assets/common/logout_modal.php"; ?>

    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/alert.js"></script>

    <script type="text/javascript"> 
        $(function(){
            $('#page_content').summernote({
                height: 300,
                placeholder: 'Type Here...',
                disableDragAndDrop: true,
                blockqouteBreakingLevel: 2,
                fontSizeUnit: 'pt',
                lineHeight: 20,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize', 'color']],
                    ['para', ['paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
            });

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            }

            $('#btn-save').on('click', function(){
                var id = $('#admission_id').val();
                var title = $('#title').val();
                var content = $('#page_content').val();
                var status = $('#status').val();

                var card_id = $('#card_id').val();
                var card_title = $('#card_title').val();
                var card_content = $('#card_content').val();

                if(title == "" || content == "") {
                    errorAlert();
                } else {
                    submit(id, title, content, status, card_id, card_title, card_content);
                }
            });
        });

        function submit(id, title, content, status, card_id, card_title, card_content) {
            $.ajax({
                url: 'controller/controller.admission_counselling.php?mode=updateContent',
                method: 'POST',
                data: {
                    id:id,
                    title:title, 
                    content:content, 
                    status:status,
                    card_id:card_id,
                    card_title:card_title,
                    card_content:card_content
                },
                success:function(){
                    $('#preloader').show();
                    window.localStorage.setItem("stat", "success");
                    window.location.href="admission_counselling.php";
                }
            });
        }
    </script>

</body>

