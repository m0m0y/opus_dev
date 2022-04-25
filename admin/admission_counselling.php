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

<body id="page-top">
    <div id="wrapper">
        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php require_once "assets/common/top_bar.php"; ?>
                
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Admission Counselling Content</h1>
                    <?= $admission_counselling->getContent() ?>
                </div>

                <div class="modal fade updateModal" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <form action="controller/controller.contact_info.php?mode=admissionUpdate" method="post" enctype="">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle"></h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="d-none">
                                        <input type="hidden" id="content_id" name="content_id" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Title:</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select class="form-control" id="contact_detail_status" name="status">
                                            <option value="0">Enabled</option>
                                            <option value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </form>

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

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "assets/common/logout_modal.php"; ?>

    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js""></script>

    <script>
         $(function(){
            // update();
        });

        function update(content_id, section, title, content, status) {
            $('.updateModal').modal('show');
            $('#modalTitle').val(section);
            $('#content_id').val(content_id);
            $('#title').val(title);
        }
    </script>

</body>