<?php
$title = "Opus - Contact Details";
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
                    <h1 class="h3 mb-4 text-gray-800">Contact Information</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contact Information List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
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

                        <!-- <form action="controller/controller.contact_info.php?mode=updateDesc" method="post" enctype=""> -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="d-none">
                                    <input type="hidden" id="info_id" name="info_id" class="form-control" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description: <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Type Here...">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status: <span class="required">*</span></label>
                                    <select class="form-control" id="contact_detail_status" name="status">
                                        <option value="0">Enabled</option>
                                        <option value="1">Disabled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary submit"><i class="fas fa-save"></i> Save</button>
                            </div>
                        <!-- </form> -->

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

    <script type="text/javascript"> 
        $(function(){
            contactTable();

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            }
        });

        function contactTable() {
            $('#dataTable').DataTable({
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.contact_info.php?mode=tableDetail",
                "columns" : [
                    { "data" : "title" },
                    { "data" : "description" },
                    { "data" : "action" }
                ],
            });
        }

        function update(id, title, desc, status) {
            $('.updateModal').modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> Update ' +title);
            $('#info_id').val(id);
            $('#desc').val(desc);
            $('#contact_detail_status').val(status);

            $('.submit').on('click', function(){
                var id = $('#info_id').val();
                var desc = $('#desc').val();
                var status = $('#contact_detail_status').val();

                if(desc == "") {
                    errorAlert();
                } else {
                    submit(id, desc, status);
                }
            });
        }

        function submit(id, desc, status) {
            $.ajax({
                url: 'controller/controller.contact_info.php?mode=updateDesc',
                method: 'POST',
                data: {
                    id:id,
                    desc:desc,
                    status:status
                },
                success:function(){
                    $('#preloader').show();
                    window.localStorage.setItem("stat", "success");
                    window.location.href="contact_info.php";
                }
            });
        }

    </script>
</body>

</html>