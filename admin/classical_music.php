<?php 
$title = "Opus - Classical Music";
require_once "assets/common/header.php";
require_once "assets/common/session.php";
require_once "controller/controller.db.php";
require_once "model/model.classical_music.php";

$classicalMusic = new ClassicalMusic();

$classicalMusicContent = $classicalMusic->getContent();
$ourCourses = $classicalMusic->getCourses();
$classical_opportunities = $classicalMusic->getClassical_opportunities();
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

<body id="page-top">

    <div id="wrapper">
        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Classical Music Page</h1>

                    <?php

                    if(isset($_GET["update"])) {
                        $id = $_GET["update"];
                        $classicalMusicWhere = $classicalMusic->getContentWhere($id);
                        ?>
                    <form action="" method="POST"  class="ajax-form" enctype="multipart/form-data" id="myform">

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-sm fa-edit"></i> <?= $classicalMusicWhere["section"] ?>
                                        <span class="badge rounded-pill bg-secondary" style="color: white;"></span>
                                    </h6>
                                    

                                    <div class="d-sm-flex align-items-center justify-content-between">

                                        <a href="classical_music.php" class="btn btn-sm btn-secondary btn-icon-split">
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
                                    <input type="hidden" name="id" id="id" value="<?= $classicalMusicWhere["id"] ?>" class="form-control" readonly>
                                </div>

                                <div class="row mb-4">
                                    <label for="info_title" class="col-sm-2 col-form-label text-right"><span class="required">*</span> Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?= $classicalMusicWhere["title"] ?>" placeholder="Type Here...">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Image:</label>
                                        <div class="col-sm-4 ">       
                                                              
                                            <input type="file" id="img" name="img" class="form-control p-1" value="<?= $classicalMusicWhere["img"] ?>" onchange='Test.UpdatePreview(this)' >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                                <div id = "preview">
                                                    <img src="assets/img/uploads/classical-music/<?= $classicalMusicWhere["img"] ?>" class="w-75 img-thumbnail">
                                                </div>
                                        </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content:</label>
                                    <div class="col-sm-9">
                                        <textarea name="page_content" id="page_content" class="form-control" required><?= $classicalMusicWhere['content'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label text-right">Status:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status">
                                            <option <?= ($classicalMusicWhere['status'] == 0 ? "selected" : "") ?> value="0">Enabled</option>
                                            <option  <?= ($classicalMusicWhere['status'] == 1 ? "selected" : "") ?> value="1">Disabled</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                        
                        <?php
                    }    ?>
                            <div class="card shadow mb-4">

                                <div class="card-header py-3">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Our Courses</span></h6>

                                        <button type="button" id="addPosition" class="btn btn-sm btn-primary btn-icon-split">
                                            <span class="icon"><i class="fas fa-plus-square"></i> </span>
                                            <span class="text">Add New</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                        <?php
                                if(!empty($ourCourses)) {
                                    foreach($ourCourses as $v) {
                                        $id = $v["id"];
                                        $course = $v["course"];
                                        $sort_by = $v["sort"];
                                        $status = $v["status"];
                                        $date_update = $v["date_update"];
                                        ?>

                                        <div class="col-lg-4 col-sm-12">

                                            <div class="card-body">
                                                <div class="container card shadow py-3">
                                                    
                                                    <div class="d-sm-flex align-items-center justify-content-between">
                                                        <h5><?= $course ?></h5>
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

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Other Learning Oppportunities</span></h6>

                                    <button type="button" id="addLearningOpportunities" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon"><i class="fas fa-plus-square"></i> </span>
                                        <span class="text">Add New</span>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                            <?php
                            if(!empty($classical_opportunities)) {
                                foreach($classical_opportunities as $v) {
                                    $id = $v["id"];
                                    $title = $v["title"];
                                    $content = $v["content"];
                                    $sort_by = $v["sort"];
                                    $status = $v["status"];
                                    $date_update = $v["date_update"];
                                    ?>
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="card-body">
                                            <div class="container card shadow py-3">
                                                
                                                <div class="d-sm-flex align-items-center justify-content-between">
                                                    <h5><?= $title ?></h5>

                                                    <p><span class="badge">Last update: <?= $date_update ?></span></p>
                                                </div>
                                            

                                                <?= ($status == 0 ? '<span class="text-primary"> Enable</span>' : ' <span class="text-warning">Disabled</span>') ?>
                                                <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-3 ">
                                                    
                                                <p1><?= $content ?></p1>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <a href="#!" class="text-danger text-decoration-none" onclick="deleteOpportunitiesLink('<?= $id ?>')">Delete &nbsp;</a> <br>
                                                    <a href="#!" class="text-info text-decoration-none" onclick="updateOpportunitiesLink('<?= $id ?>', '<?= $title ?>', '<?= $content ?>','<?= $sort_by ?>', '<?= $status ?>')">Update &rarr; </a>
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
                        if(!empty($classicalMusicContent)) {
                            foreach($classicalMusicContent as $v) {
                                $id = $v["id"];
                                $section = $v["section"];
                                $title = $v["title"];
                                $img = $v["img"];
                                $content = $v["content"];
                                $category = $v["category"];
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

                                            <a href="classical_music.php?update=<?= $id ?>" class="btn btn-sm btn-info btn-icon-split">
                                                <span class="icon"><i class="fas fa-pen"></i> </span>
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
                                                <div class="skeleton content_load"><img src= "assets/img/uploads/classical-music/<?= $img ?>" class="w-50 img-thumbnail" /></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php
                            }
                        }
                    ?>

                </div>
         

            <div class="modal fade" id="staticBackdrop" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                        </div>

                        <div class="modal-body">
                            <div class="d-none">
                                <input type="hidden" id="course_id" name="course_id" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Position: <span class="required">*</span></label>
                                <input type="text" class="form-control" name="course" id="course" placeholder="Type Here...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sort By:</label>
                                <input type="number" class="form-control" name="sort_by" id="sort_by" value="0">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status: </label>
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

                            <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit-btn">
                                <span class="icon"><i class="fas fa-save"></i></span>
                                <span class="text">Save</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdropp" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalOpportunitiesTitle"></h5>
                        </div>

                        <div class="modal-body">
                            <div class="d-none">
                                <input type="hidden" id="opportunity_id" name="opportunity_id" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Title<span class="required">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Type Here...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Content<span class="required">*</span></label>
                                <input type="text" class="form-control" name="content" id="learning_content" placeholder="Type Here...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sort By:</label>
                                <input type="number" class="form-control" name="sort_by" id="sort_by_content" value="0">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Status: </label>
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

                            <button type="submit" class="btn btn-sm btn-primary btn-icon-split submit-btnOpportunities">
                                <span class="icon"><i class="fas fa-save"></i></span>
                                <span class="text">Save</span>
                            </button>
                        </div>

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
    <script src="services/classical_music.js"></script>

</body>

</html>