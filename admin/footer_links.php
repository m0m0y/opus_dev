<?php
$title = "Opus - Footer Links";
require_once "assets/common/header.php";
require_once "controller/controller.auth.php";

$auth = new Auth();
$isLoggedIn = $auth->getSession("auth");
$auth->redirect("auth", true, "index.php");
$user = $auth->getSession("name");
?>

<link rel="stylesheet" type="text/css" href="lib/datatable/datatables.min.css">
<script type="text/javascript" charset="utf8" src="lib/datatable/datatables.min.js"></script>

<body id="page-top">

    <div id="wrapper">
        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Footer Links</h1>

                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Useful Links</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="usefulLinksTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>URL</th>
                                                    <th>Status</th>
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

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Our Services</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="ourServicesTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>URL</th>
                                                    <th>Status</th>
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
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="d-none">
                                        <input type="hidden" id="link_id" name="link_id" class="form-control" readonly>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title:</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">URL:</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Type Here...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sort:</label>
                                        <div class="col-sm-10">
                                        <input type="number" class="form-control" id="sort" name="sort" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Label:</label>
                                        <div class="col-sm-10">
                                        <select class="form-control" id="label" name="label">
                                            <option value="Useful Links">Useful Links</option>
                                            <option value="Our Services">Our Services</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status:</label>
                                        <div class="col-sm-10">
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">Enabled</option>
                                            <option value="1">Disabled</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary submit"><i class="fas fa-save"></i> Save</button>
                                </div>

                            </div>
                        </div>
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

    <script>
         $(function(){
            footerLinks();

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            }
        });

        function footerLinks() {
            $('#usefulLinksTable').DataTable({
                "searching": false,
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.footer_links.php?mode=usefulLinksTable",
                "columns" : [
                    { "data" : "title" },
                    { "data" : "url" },
                    { "data" : "status" },
                    { "data" : "action" }
                ],
            });

            $('#ourServicesTable').DataTable({
                "searching": false,
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.footer_links.php?mode=ourServicesTable",
                "columns" : [
                   { "data" : "title" },
                    { "data" : "url" },
                    { "data" : "status" },
                    { "data" : "action" }
                ],
            });
        }

        function update(id, url, title, sort, label, status) {
            $('.updateModal').modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> Update ' +title);
            $('#link_id').val(id);
            $('#url').val(url);
            $('#title').val(title);
            $('#sort').val(sort);
            $('#label').val(label);
            $('#status').val(status);

            $('.submit').on('click', function(){
                var id = $('#link_id').val();
                var url = $('#url').val();
                var title = $('#title').val();
                var sort = $('#sort').val();
                var label = $('#label').val();
                var status = $('#status').val();

                if(url == "" || title == "") {
                    errorAlert();
                } else {
                    submit(id, url, title, sort, label, status);
                }
            });
        }

        function submit(id, url, title, sort, label, status) {
            $.ajax({
                url: 'controller/controller.footer_links.php?mode=updateLinks',
                method: 'POST',
                data: {
                    id:id,
                    url:url,
                    title:title,
                    sort:sort,
                    label:label,
                    status:status
                },
                success:function() {
                    window.localStorage.setItem("stat", "success");
                    window.location.href="footer_links.php";
                }
            });
        }
    </script>

</body>

</html>