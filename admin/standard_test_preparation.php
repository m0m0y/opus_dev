<?php
$title = "Opus - Standardized Test Preparation";
require_once "assets/common/header.php";
require_once "assets/common/session.php";
require_once "controller/controller.db.php";
require_once "model/model.standard_test_preparation.php";

$standardTestPreparation = new StandardTestPreparation();

$standardTestPreparationContent = $standardTestPreparation->getContent();
// $standardTestPreparationImg = $standardTestPreparationImg->getImage();
?>

<link rel="stylesheet" type="text/css" href="lib/summernote/summernote-bs4.css">
<script type="text/javascript" charset="utf8" src="lib/summernote/summernote-bs4.min.js"></script>
<script src="lib/summernote/summernote-image-attributes/summernote-image-attributes.js"></script>

<style>
     .preview{
   width: 1000px;
   height: 1000px;
   border: 1px solid black;
   margin: 0 auto;
   background: white;
  }
  .image-upload>input {
  display: none;
}

    .preview img{
    display: none;
    }
</style>
</style>

<body id="page-top">

    <div id="wrapper">

        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Standardized Test Preparation</h1>

                    <?php

                    if(isset($_GET["update"])) {

                        $test_preparation_id = $_GET["update"];
                        $standardTestPreparationContentWhere = $standardTestPreparation->getContentWhere($test_preparation_id);
                        // $test_preparation_img = $standardTestPreparation->getImage($img);
                        ?>
                      <form action="" method="POST"  class="ajax-form" enctype="multipart/form-data" id="myform">

                        <div class="cardshadow mb-4">

                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> <?= $standardTestPreparationContentWhere["title"] ?>
                                        <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                                    </h6>

                                    <div class="d-sm-flex align-items-center justify-content-between">

                                        <a href="standard_test_preparation.php" class="btn btn-sm btn-secondary btn-icon-split">
                                            <span class="icon"><i class="fas fa-arrow-left"></i> </span>
                                            <span class="text">Back</span>
                                        </a>

                                        <button id="btn-save" class="btn btn-sm btn-primary btn-icon-split m-1">
                                            <span class="icon"><i class="fas fa-save"></i></span>
                                            <span class="text">Save</span>
                                        </button>

                                    </div>
                                    
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="d-none">
                                    <input type="hidden" name="id" id="id" value="<?= $standardTestPreparationContentWhere["id"] ?>" class="form-control" readonly>
                                </div>

                                <div class="row mb-4">
                                    <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?= $standardTestPreparationContentWhere["title"] ?>" placeholder="Type Here...">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Image:</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="img" name="img" class="form-control p-1" value="<?= $standardTestPreparationContentWhere["img"] ?>" onchange='Test.UpdatePreview(this)' >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div id = "preview">
                                                <img src="assets/img/uploads/test-prep/<?= $standardTestPreparationContentWhere["img"] ?>" class="w-75 img-thumbnail"> 
                                            </div>
                                        </div>
                                </div>
                            

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                    <div class="col-sm-9">
                                        <textarea name="page_content" id="page_content" class="form-control"  required><?= $standardTestPreparationContentWhere['content'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status">
                                            <option <?= ($standardTestPreparationContentWhere['status'] == 0 ? "selected" : "") ?> value="0">Enabled</option>
                                            <option  <?= ($standardTestPreparationContentWhere['status'] == 1 ? "selected" : "") ?> value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <?php
                    } else {

                        if(!empty($standardTestPreparationContent)) {
                            foreach ($standardTestPreparationContent as $v) {
                                $id = $v["id"];
                                $title = $v["title"];
                                $img = $v["img"];
                                $content = $v["content"];
                                $status = $v["status"];
                                $date_update = $v["date_update"];
                                ?>
    
                                <div class="card shadow mb-4">
    
                                    <div class="card-header py-3">
                                        <div class="d-sm-flex align-items-center justify-content-between">
    
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                <?= $title ?> <span class="badge bg-secondary" style="color: white;">Last update: <?= $v['date_update'] ?></span>
                                                <?= ($status == 0 ? "" : '<span class="badge bg-warning" style="color: black;">Disabled</span>') ?>
                                            </h6>
    
                                            <a href="standard_test_preparation.php?update=<?= $id ?>" class="btn btn-sm btn-info btn-icon-split">
                                                <span class="icon"><i class="fas fa-pen"></i></span>
                                                <span class="text">Update</span>
                                            </a>
    
                                        </div>
                                    </div>

    
                                    <div class="card-body"> 

                                        <div class = "row">
                                            <div class="container-fluid col-sm-6">
                                                <div class="skeleton content_load"><?= $content ?></div>
                                            </div>

                                            <div class="container-fluid col-sm-6">
                                                <div class="skeleton content_load"><img src="assets/img/uploads/test-prep/<?= $img; ?>" class="w-50 img-thumbnail" /></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
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
    <script src="services/standard_test_preparation.js"></script>

</body>

</html>
