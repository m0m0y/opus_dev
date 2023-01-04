<?php
$title = "Opus - Early Learning";
require_once "assets/common/header.php";
require_once "assets/common/session.php";
require_once "controller/controller.db.php";
require_once "model/model.early_learning.php";
require_once "model/model.card.php";

$earlyLearning = new EarlyLearning();
$card = new Cards();

$earlyLearningContent = $earlyLearning->getEarlyLearningContent();
$earlyLearning_courses = $earlyLearning->getEarly_learning_courses();


$page = "early-learning.php";
$cardContent = $card->getContentWhere($page);
?>

<link rel="stylesheet" type="text/css" href="lib/summernote/summernote-bs4.css">
<script type="text/javascript" charset="utf8" src="lib/summernote/summernote-bs4.min.js"></script>
<script src="lib/summernote/summernote-image-attributes/summernote-image-attributes.js"></script>

<body id="page-top">

    <div id="wrapper">

        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Early Learning</h1>

                    <?php
                    if(isset($_GET["update"])) {

                        $early_learn_id = $_GET["update"];
                        $earlyLearningWhere = $earlyLearning->getEarlyLearningWhere($early_learn_id);
                        ?>

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> <?= $earlyLearningWhere["title"] ?>
                                        <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                                    </h6>

                                    <div class="d-sm-flex align-items-center justify-content-between">

                                        <a href="early_learning.php" class="btn btn-sm btn-secondary btn-icon-split">
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
                                    <input type="hidden" name="id" id="id" value="<?= $earlyLearningWhere["id"] ?>" class="form-control" readonly>
                                </div>

                                <div class="row mb-4">
                                    <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?= $earlyLearningWhere["title"] ?>" placeholder="Type Here...">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                    <div class="col-sm-9">
                                        <textarea name="page_content" id="page_content" class="form-control" required><?= $earlyLearningWhere['content'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status">
                                            <option <?= ($earlyLearningWhere['status'] == 0 ? "selected" : "") ?> value="0">Enabled</option>
                                            <option  <?= ($earlyLearningWhere['status'] == 1 ? "selected" : "") ?> value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <?php
                    } else {

                        if(!empty($earlyLearningContent)) {

                            foreach ($earlyLearningContent as $v) {
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
        
                                            <h6 class="m-0 font-weight-bold text-primary ">
                                                <?= $title ?> <span class="badge bg-secondary" style="color: white;">Last update: <?= $v['date_update'] ?></span>
                                                <?= ($status == 0 ? "" : '<span class="badge bg-warning" style="color: black;">Disabled</span>') ?>
                                            </h6>
        
                                            <a href="early_learning.php?update=<?= $id ?>" class="btn btn-sm btn-info btn-icon-split">
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
                                                <div class="skeleton content_load"><img src= "assets/img/uploads/early-learning/<?= $img ?>" class="w-50 img-thumbnail" /></div>
                                            </div>
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
                                    <h6 class="m-0 font-weight-bold text-primary">In these classes, young children will learn to:</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 d-flex align-items-stretch">
                                    <div class="card-body col-xl-12 d-flex align-items-stretch">

                                        <?php
                                        if(!empty($earlyLearning_courses)) {
                                            foreach ($earlyLearning_courses as $v) {
                                                $id = $v["id"];
                                                $course = $v["course"];
                                                $sort = $v["sort"];
                                                $status = $v["status"];
                                                $date_update = $v["date_update"];
                                                ?>

                                                    <div class="col-lg-4 col-sm-12">

                                                    <div class="card-body">
                                                        <div class="container card shadow py-3">
                                                            
                                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                                <span"><?= $course ?></span>
                                                                <p><span class="badge">Last update: <?= $date_update ?></span></p>
                                                            </div>

                                                            <?= ($status == 0 ? '<span class="text-primary"> Enable</span>' : ' <span class="text-warning">Disabled</span>') ?>

                                                            <div class="d-flex justify-content-end">
                                                                <a href="#!" class="text-danger text-decoration-none" onclick="deleteLink('<?= $id ?>')">Delete &nbsp;</a> <br>
                                                                <a href="#!" class="text-info text-decoration-none" onclick="updateLink('<?= $id ?>', '<?= $course ?>', '<?= $sort_by ?>', '<?= $status ?>')">Update &rarr; </a>
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
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                     

                </div>
                
                <p>asdfasdsa</p>
                
            </div>

            <div class="modal fade" id="staticBackdrop" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                        </div>

                        <div class="modal-body">

                            <div class="d-none">
                                <input type="hidden" id="card_id" name="card_id" readonly>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title: </label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="card_title" name="card_title" placeholder="Type Here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content: </label>

                                <div class="col-sm-10">
                                    <textarea name="card_content" id="card_content"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Status:</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="0">Enabled</option>
                                        <option value="1">Disabled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-warning mt-4" role="alert"><b>Note:</b> Please avoid using single quote symbols (') or the system will automatically remove.</div>

                        </div>

                        <div class="modal-footer">

                            <button type="close" class="btn btn-sm btn-secondary btn-icon-split closeBtn" data-dismiss="modal">
                                <span class="icon"><i class="fas fa-window-close"></i></span>
                                <span class="text">Close</span>
                            </button>

                            <button type="button" class="btn btn-sm btn-danger btn-icon-split resetBtn">
                                <span class="icon"><i class="fas fa-trash"></i></span>
                                <span class="text">Clear Form</span>
                            </button>

                            <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit">
                                <span class="icon"><i class="fas fa-save"></i></span>
                                <span class="text">Save</span>
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

        <div>

    </div>

    <div id="preloader" style="display: none;"></div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "assets/common/logout_modal.php"; ?>

    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/alert.js"></script>
    <script src="services/early_learning.js"></script>

</body>