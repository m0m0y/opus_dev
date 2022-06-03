<?php
$title = "Opus - Careers Page";
require_once "assets/common/header.php";
require_once "controller/controller.auth.php";
require_once "controller/controller.db.php";
require_once "model/model.careers.php";

$auth = new Auth();
$careers = new Careers();

$careersContent = $careers->getContent();
$hiringPostion = $careers->hiringPostion();

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
                    <h1 class="h3 mb-4 text-gray-800">Careers Page</h1>
                    
                    <?php
                    if (isset($_GET["update"])) {
                        $careers_id = $_GET["update"];
                        $careersContentWhere = $careers->getContentWhere($careers_id);
                        ?>
                    
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">

                                <div class="d-sm-flex align-items-center justify-content-end">

                                    <a href="careers.php" class="btn btn-sm btn-secondary btn-icon-split">
                                        <span class="icon"><i class="fas fa-arrow-left"></i> </span>
                                        <span class="text">Back</span>
                                    </a> 

                                    <button id="btn-save" class="btn btn-sm btn-primary btn-icon-split m-1">
                                        <span class="icon"><i class="fas fa-save"></i></span>
                                        <span class="text">Save</span>
                                    </button>
                            
                                </div>
                                
                            </div>

                            <div class="card-body">

                                <div class="d-none">
                                    <input type="hidden" name="careers_id" id="careers_id" value="<?= $careersContentWhere["id"] ?>" class="form-control" readonly>
                                </div>

                                <div class="row mb-4">
                                    <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?= $careersContentWhere["title"] ?>" placeholder="Type Here...">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                    <div class="col-sm-9">
                                        <textarea name="careers_content" id="careers_content" class="form-control" required><?= $careersContentWhere["content"] ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status">
                                            <option <?= ($careersContentWhere["status"] == 0 ? "selected" : "") ?> value="0">Enabled</option>
                                            <option <?= ($careersContentWhere["status"] == 1 ? "selected" : "") ?> value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                    } else {
                        if (!empty($careersContent)) {
                            foreach ($careersContent as $k=>$v) {
                                $id = $v["id"];
                                $title = $v["title"];
                                $content = $v["content"];
                                $status = $v["status"];
                                $date_update = $v["date_update"];
                                ?>
                            
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
            
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                <?= $title ?> <span class="badge bg-secondary" style="color: white;">Last update: <?= $date_update ?></span>
                                                <?= ($status == 0 ? "" : '<span class="badge bg-warning" style="color: black;">Disabled</span>') ?>
                                            </h6>
            
                                            <a href="careers.php?update=<?= $id ?>" class="btn btn-sm btn-info btn-icon-split">
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

                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Vacant Positions</span></h6>

                                    <button type="button" id="addPosition" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon"><i class="fas fa-plus-square"></i> </span>
                                        <span class="text">Add Position</span>
                                    </button>
                                </div>

                            </div>

                            <div class="row">
                                <?php
                                if (!empty($hiringPostion)) {
                                    foreach ($hiringPostion as $k=>$v) {
                                        $id = $v["id"];
                                        $position = $v["position"];
                                        $sort_by = $v["sort_by"];
                                        $status = $v["status"];
                                        $date_update = $v["date_update"];
                                        ?>

                                        <div class="col-lg-4 col-sm-12">

                                            <div class="card-body">
                                                <div class="container card shadow py-3">
                                                    
                                                    <div class="d-sm-flex align-items-center justify-content-between">
                                                        <h5><?= $position ?></h5>
                                                        <p><span class="badge">Last update: <?= $date_update ?></span></p>
                                                    </div>

                                                    <?= ($status == 0 ? '<span class="text-primary"> Enable</span>' : ' <span class="text-warning">Disabled</span>') ?>

                                                    <div class="d-flex justify-content-end">
                                                        <a href="#!" class="text-danger text-decoration-none" onclick="deleteLink('<?= $id ?>')">Delete &nbsp;</a> <br>
                                                        <a href="#!" class="text-info text-decoration-none" onclick="updateLink('<?= $id ?>', '<?= $position ?>', '<?= $sort_by ?>', '<?= $status ?>')">Update &rarr; </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>

            
            <div class="modal fade staticModal" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                        </div>

                        <div class="modal-body">
                            <div class="d-none">
                                <input type="hidden" id="careers_id" name="careers_id" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Position: <span class="required">*</span></label>
                                <input type="text" class="form-control" name="position" id="position" placeholder="Type Here...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sort By:</label>
                                <input type="text" class="form-control" name="sort_by" id="sort_by" value="0">
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

                            <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit">
                                <span class="icon"><i class="fas fa-save"></i></span>
                                <span class="text">Save</span>
                            </button>

                            <button type="submit" class="btn btn-sm btn-primary btn-icon-split update">
                                <span class="icon"><i class="fas fa-save"></i></span>
                                <span class="text">Update</span>
                            </button>
                        </div>

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
        $(function(){
            $('#careers_content').summernote({
                height: 500,
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

            var module_status = window.localStorage.getItem("stat");
            if (module_status == "success") {
                sucessAlert();
                localStorage.clear();
            }

            $('#btn-save').on('click', function(){
                var careers_id = $('#careers_id').val();
                var title = $('#title').val();
                var careers_content = $('#careers_content').val();
                var status = $('#status').val();

                if (careers_id == "" || title == "" || careers_content == "") {
                    errorAlert();
                } else {
                    submitUpdate(careers_id, title, careers_content, status);
                }
            });

            $('#addPosition').on('click', function() {
                $('.staticModal').modal('show');
                $('#modalTitle').html('<i class="fas fa-plus"></i> Add New Position');
                $('.update').hide();
                $('.submit').show();

                $('.submit').on('click', function() {
                    var position = $('#position').val();
                    var sort_by = $('#sort_by').val();
                    var status = $('#status').val();

                    if (position == "") {
                        errorAlert();
                    } else {
                        submitAddNew(position, sort_by, status);
                    }
                });

                $('.closeBtn').on('click', function() {
                    window.location.href="careers.php";
                });
            });

        });

        function submitUpdate(careers_id, title, careers_content, status) {
            $.ajax({
                url: 'controller/controller.careers.php?mode=updateContent',
                method: 'POST',
                data: {
                    careers_id:careers_id,
                    title:title,
                    careers_content:careers_content,
                    status:status
                },
                success:function() {
                    window.localStorage.setItem("stat", "success");
                    window.location.href="careers.php";
                }
            });
        }

        function submitAddNew(position, sort_by, status) {
            $.ajax({
                url: 'controller/controller.careers.php?mode=addPosition',
                method: 'POST',
                data: {
                    position:position,
                    sort_by:sort_by,
                    status:status
                },
                success:function() {
                    window.localStorage.setItem("stat", "success");
                    window.location.href="careers.php";
                }
            });
        }

        function deleteLink(id) {
            Swal.fire({
            title: 'Please confirm to Delete',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'controller/controller.careers.php?mode=deletePosition',
                        method: 'POST',
                        data: {
                            id:id
                        },
                        success: function(response) {
                            var resValue = jQuery.parseJSON( response );

                            if(resValue['message'] == "Delete Success") {
                                Swal.fire(
                                    'Deleted Successfully!',
                                    '',
                                    'success'
                                ).then(function(){
                                    window.location.href = "careers.php";
                                });
                            } else  {
                                Swal.fire(
                                    'Error!',
                                    'Opps! Something went wrong.',
                                    'error'
                                ).then(function(){
                                    window.location.href = "careers.php";
                                });
                            }

                        }
                    })
                }
            })
        }

        function updateLink(id, position, sortby, status) {
            $('.staticModal').modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + position);
            $('.submit').hide();
            $('.update').show();

            $('#careers_id').val(id);
            $('#position').val(position);
            $('#sort_by').val(sortby);
            $('#status').val(status);

            $('.update').on('click', function() { 
                var id = $('#careers_id').val();
                var position = $('#position').val();
                var sort_by = $('#sort_by').val();
                var status = $('#status').val();

                if (position == "") {
                    errorAlert();
                } else {
                    updateHiringPosition(id, position, sort_by, status);
                }
            });
        }

        function updateHiringPosition(id, position, sort_by, status) {
            $.ajax({
                url: 'controller/controller.careers.php?mode=updatePosition',
                method: 'POST',
                data: {
                    id:id,
                    position:position,
                    sort_by:sort_by,
                    status:status
                },
                success:function() {
                    window.localStorage.setItem("stat", "success");
                    window.location.href="careers.php";
                }  
            });
        }

    </script>

</body>