<?php 
date_default_timezone_set("Asia/Manila");
$title = "Opus - Card Content";
require_once "assets/common/header.php";
require_once "controller/controller.auth.php";

$auth = new Auth();
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
                    <h1 class="h3 mb-4 text-gray-800">Card Contents</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Card Information List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Section</th>
                                            <th>Content</th>
                                            <th>Page</th>
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
            </div>

            <div class="modal fade updateModal" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- <form action="controller/controller.contact_info.php?mode=updateDesc" method="post" enctype=""> -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container">
                                    <div class="d-none">
                                        <input type="hidden" id="card_id" name="card_id" class="form-control" readonly>
                                    </div>

                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right">Section:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="section" name="section">
                                                <option value="Section I">Section I</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="card_title" id="card_title" placeholder="Type Here...">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                        <div class="col-sm-10">
                                            <textarea name="card_content" id="card_content" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right"> Link:</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" name="link" id="link" placeholder="Type Here...">
                                            <small style="color: red;">(Optional)</small>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Page:</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" name="page" id="page" placeholder="Type Here...">
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-4">
                                        <label class="col-sm-2 col-form-label text-right">Status:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status" name="status">
                                                <option value="0">Enabled</option>
                                                <option value="1">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="close" class="btn btn-sm btn-secondary btn-icon-split" data-dismiss="modal">
                                    <span class="icon"><i class="fas fa-window-close"></i></span>
                                    <span class="text">Close</span>
                                </button>

                                <button type="submit" class="btn btn-sm btn-danger btn-icon-split clear">
                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                    <span class="text">Clear Form</span>
                                </button>

                                <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit">
                                    <span class="icon"><i class="fas fa-save"></i></span>
                                    <span class="text">Save</span>
                                </button>
                            </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "assets/common/logout_modal.php"; ?>
    
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/alert.js"></script>

    <script type="text/javascript"> 
        $(function(){
            $('#card_content').summernote({
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
                    ['insert', ['link']],
                    ['view', ['fullscreen']],
                ]
            });

            cardTable();

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            }

            $('.clear').click(function(){
                $('input[type=text], input[type=url]').val('');
                $('#card_content').summernote('code', '');
            });
        });

        function cardTable() {
            $('#dataTable').DataTable({
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.card.php?mode=cardDetail",
                "columns" : [
                    { "data" : "card_title" },
                    { "data" : "section" },
                    { "data" : "content" },
                    { "data" : "page" },
                    { "data" : "action" }
                ],
            });
        }

        function update(id, section, card_title, content, link, page, card_status) {
            $('.updateModal').modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' +card_title);

            $('#card_id').val(id);
            $('#section').val(section);
            $('#card_title').val(card_title);
            $('#card_content').summernote('code', content);
            $('#link').val(link);
            $('#page').val(page);
            $('#status').val(card_status);

            $('.submit').on('click', function(){
                var card_id = $('#card_id').val();
                var section = $('#section').val();
                var card_title = $('#card_title').val();
                var card_content = $('#card_content').val();
                var link = $('#link').val();
                var page = $('#page').val();
                var status = $('#status').val();

                if (section == "" || card_title == "" || card_content == "" || page == "") {
                    errorAlert();
                } else {
                    submit(card_id, section, card_title, card_content, link, page, status);
                }
            });
        }

        function submit(card_id, section, card_title, card_content, link, page, status) {
            $.ajax({
                url: 'controller/controller.card.php?mode=updateCard',
                method: 'POST',
                data: {
                    card_id:card_id,
                    section:section,
                    card_title:card_title,
                    card_content:card_content,
                    link:link,
                    page:page,
                    status:status
                },
                success:function(){
                    window.localStorage.setItem("stat", "success");
                    window.location.href="card.php";
                }
            });
        }
    </script>

</body>

</html>