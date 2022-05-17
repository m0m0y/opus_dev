<?php 
$title = "Opus - History and Team";
require_once "assets/common/header.php";
require_once "controller/controller.auth.php";
require_once "controller/controller.db.php";
require_once "model/model.history_and_team.php";

$auth = new Auth();
$historyAndTeams = new HistoryAndTeams();

$historyContent = $historyAndTeams->getHistoryContent();
$teamList = $historyAndTeams->getTeamList();

$isLoggedIn = $auth->getSession("auth");
$auth->redirect("auth", true, "index.php");
$user = $auth->getSession("name");
?>

<link rel="stylesheet" type="text/css" href="lib/summernote/summernote-bs4.css">
<script type="text/javascript" charset="utf8" src="lib/summernote/summernote-bs4.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/datatable/datatables.min.css">
<script type="text/javascript" charset="utf8" src="lib/datatable/datatables.min.js"></script>

<body id="page-top">

    <div id="wrapper">

        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">History and Team Page</h1>

                    <?php
                    if (isset($_GET["update"])) {
                        $id = $_GET["update"];
                        $historyContentWhere = $historyAndTeams->getHistoryContentWhere($id);
                        ?>

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> <?= $historyContentWhere["section"] ?>
                                        <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                                    </h6>

                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <button id="btn-save" class="btn btn-sm btn-primary btn-icon-split m-1">
                                            <span class="icon"><i class="fas fa-save"></i></span>
                                            <span class="text">Save</span>
                                        </button>

                                        <a href="history_and_team.php" class="btn btn-sm btn-secondary btn-icon-split">
                                            <span class="icon"><i class="fas fa-arrow-left"></i> </span>
                                            <span class="text">Back</span>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="d-none">
                                    <input type="hidden" name="history_id" id="history_id" value="<?= $historyContentWhere["id"] ?>" class="form-control" readonly>
                                </div>

                                <div class="row mb-4">
                                    <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?= $historyContentWhere["title"] ?>" placeholder="Type Here...">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                    <div class="col-sm-9">
                                        <textarea name="page_content" id="page_content" class="form-control" required><?= $historyContentWhere['content'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status">
                                            <option <?= ($historyContentWhere['status'] == 0 ? "selected" : "") ?> value="0">Enabled</option>
                                            <option  <?= ($historyContentWhere['status'] == 1 ? "selected" : "") ?> value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                    } else {
                        if (!empty($historyContent)) {

                            foreach ($historyContent as $k => $v) {
                                $id = $v["id"];
                                $title = $v["title"];
                                $content = $v["content"];
                                $status = $v["status"];
                                $date_update = $v["date_update"];
                                ?>
        
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
            
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <h5 class="m-0 font-weight-bold text-primary">
                                                <?= $title ?> <span class="badge bg-secondary" style="color: white;">Last update: <?= $date_update ?></span>
                                                <?= ($status == 0 ? "" : '<span class="badge bg-warning" style="color: black;">Disabled</span>') ?>
                                            </h5>
            
                                            <a href="history_and_team.php?update=<?= $id ?>" class="btn btn-sm btn-info btn-icon-split">
                                                <span class="icon"><i class="fas fa-pen"></i> </span>
                                                <span class="text">Update</span>
                                            </a>
                                        </div>
            
                                    </div>
            
                                    <div class="card-body">
            
                                        <div class="container-fluid">
                                            <?= $content ?>
                                        </div>
                                
                                    </div>
                                </div>
        
                                <?php
                            }
                        }

                        ?>

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> Opus Team</h6>
                            </div>

                                <div class="card-body">

                                    <div class="container-fluid">
                                        <div class="table-responsive">

                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Date Added</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                            </div>

                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>

            
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                        </div>

                        <form name="form" method="post" action="controller/controller.history_and_team.php?mode=updateTeamInfo" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="">
                                    <input type="text" id="id" name="id" class="form-control" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fullname: <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Type Here...">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Upload Image: </label> <small style="color: red;">(Optional)</small>
                                    
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Position: <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="position" id="position" placeholder="Type Here...">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Introduction: <span class="required">*</span></label>
                                    <textarea name="page_content" id="page_content"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status: <span class="required">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0">Enabled</option>
                                        <option value="1">Disabled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="close" class="btn btn-sm btn-secondary btn-icon-split closeBtn" data-dismiss="modal">
                                    <span class="icon"><i class="fas fa-window-close"></i></span>
                                    <span class="text">Close</span>
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger btn-icon-split">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                    <span class="text">Clear Form</span>
                                </button>

                                <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit">
                                    <span class="icon"><i class="fas fa-save"></i></span>
                                    <span class="text">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
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

    <script>
       $(function() {
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

            $('#btn-save').on('click', function() {
                var id = $('#history_id').val();
                var title = $('#title').val();
                var page_content = $('#page_content').val();
                var status = $('#status').val();

                if (title == "" || page_content == "" || status == "") {
                    errorAlert();
                } else {
                    submitHistoryData(id, title, page_content, status);
                }
            });

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            }

            listTeams();
       });

       function submitHistoryData(id, title, page_content, status) {
            $.ajax({
                url: 'controller/controller.history_and_team.php?mode=updateHistoryContent',
                method: 'POST',
                data: {
                    id:id,
                    title:title,
                    page_content:page_content,
                    status:status
                },
                success:function(){
                    window.localStorage.setItem("stat", "success");
                    window.location.href="history_and_team.php";
                }
            });
       }

        function listTeams() {
            $('#dataTable').DataTable({
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.history_and_team.php?mode=listTeams",
                "columns" : [
                    { "data" : "name" },
                    { "data" : "position" },
                    { "data" : "status" },
                    { "data" : "date_added" },
                    { "data" : "action" }
                ],
            });
        }

        function updateTeamsTable(id, img, name, position, status, date_added) {
            $('#staticBackdrop').addClass('staticModal'+id);

            $('.staticModal'+id).modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + position);

            $('#id').val(id);
            $('#name').val(name);
            $('#position').val(position);
            $('#status').val(status);
            $('#date_added').val(date_added);
            
            $('.closeBtn').on('click', function() {
                $('#staticBackdrop').removeClass('staticModal'+id);
            });
        }
    </script>

</body>