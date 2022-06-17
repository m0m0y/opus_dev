<?php
$title = "Opus - Home Page";
require_once "assets/common/header.php";
require_once "assets/common/session.php";
require_once "controller/controller.db.php";
require_once "model/model.home_page.php";

$homePage = new HomePage();

$homePageHero = $homePage->getHero();
?>

<link rel="stylesheet" type="text/css" href="lib/summernote/summernote-bs4.css">
<script type="text/javascript" charset="utf8" src="lib/summernote/summernote-bs4.min.js"></script>
<script src="lib/summernote/summernote-image-attributes/summernote-image-attributes.js"></script>
<link rel="stylesheet" type="text/css" href="lib/datatable/datatables.min.css">
<script type="text/javascript" charset="utf8" src="lib/datatable/datatables.min.js"></script>

<!-- <link rel="stylesheet" href="lib/swiper/swiper-bundle.min.css"/>
<script type="text/javascript" charset="utf8" src="lib/swiper/swiper-bundle.min.js"></script> -->

<body id="page-top">

    <div id="wrapper">
        <?php require_once "assets/common/side_bar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php require_once "assets/common/top_bar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Home Page</h1>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Hero Images</span></h6>

                                <button type="button" id="addImageHero" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon"><i class="fas fa-plus-square"></i> </span>
                                    <span class="text">Add New</span>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataHeroImage" style="table-layout: fixed; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Link</th>
                                            <th>Sort By</th>
                                            <th>Status</th>
                                            <th>Date Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="card shadow mb-4">

                        <div class="card-header py-3">

                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Card Contents</span></h6>

                                <button type="button" id="addCard" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon"><i class="fas fa-plus-square"></i> </span>
                                    <span class="text">Add New</span>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Date Update</th>
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

            <div class="modal fade cardContentModal" id="staticBackdrop" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                        </div>

                        <form name="form" method="post" id="modalCardForm" action="controller/controller.home_page.php?mode=updateCardContent" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="d-none">
                                    <input type="hidden" id="card_id" name="card_id" readonly>
                                </div>

                                <div class="mb-5">
                                    <div class="row">

                                        <div class="col-xl-4 col-sm-12">

                                            <center>
                                                <div id="thumbnail-container" class="img-thumbnail-container">
                                                    <img src="" alt="" id="card-image">
                                                </div>
                                            </center>
                                           
                                        </div>

                                        <div class="col-xl-8 col-sm-12">

                                            <div class="mb-3">
                                                <label class="form-label">Card Title: <span class="required">*</span></label>
                                                <input type="text" class="form-control" name="card_title" id="card_title" placeholder="Type Here...">
                                            </div>

                                            <label class="form-label">Upload Image: </label> <small style="color: red;">(Optional)</small>
                                            
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Content: </label>

                                    <div class="col-sm-10">
                                        <textarea name="card_content" id="card_content"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Link: </label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Type Here...">
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

                                <div class="alert alert-warning mt-4" role="alert"><b>Note:</b> Please avoid using single/double quote symbols or the system will automatically remove.</div>

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
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade heroImgModal" id="staticBackdrop" data-backdrop="static" aria-labelledby="staticBackdropLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleHero"></h5>
                        </div>

                        <form name="form" method="post" id="modalForm" action="" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="d-none">
                                    <input type="hidden" id="hero_id" name="hero_id" readonly>
                                </div>

                                <div class="container">

                                    <center>
                                        <div id="thumbnail-container">
                                            <img src="" id="hero-image">
                                            <span class="note"></span>
                                        </div>
                                    </center>

                                    <br>
                                
                                    <div class="form-group row"> 
                                        <label class="col-sm-2 col-form-label text-right"><span class="required">*</span> Hero Title: </label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Type Here...">
                                        </div>
                                    </div>

                                    <div class="form-group row"> 
                                        <label class="col-sm-2 col-form-label text-right"> Image: </label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row"> 
                                        <label class="col-sm-2 col-form-label text-right"> Button Name: </label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="link_title" id="link_title" placeholder="Type Here...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">URL: </label>

                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="url" name="url" placeholder="Type Here...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Sort By: </label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="sort_by" name="sort_by">
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
                                
                               </div>

                               <div class="alert alert-warning mt-4" role="alert"><b>Note:</b> Please avoid using single/double quote symbols or the system will automatically remove.</div>

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
            cardData();
            heroData();
            addHeroImg();

            addCardContent();

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
                    ['view', ['fullscreen']],
                ],

                popover: {
                    image: [
                        ['custom', ['imageAttributes']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                },
                lang: 'en-US',
                imageAttributes:{
                    icon:'<i class="fas fa-sm fa-edit"/>',
                    removeEmpty:false,
                    disableUpload: false
                }
            });

            var status_module =  window.localStorage.getItem("stat");
            if(status_module == "success"){
                sucessAlert();
                localStorage.clear();
            } else if(status_module == "error") {
                errorAlert();
                localStorage.clear();
            } else if(status_module == "errorUpload") {
                errorUpload();
                localStorage.clear();
            } else if (status_module == "invalidFormat") {
                invalidFormat();
                localStorage.clear();
            }

            // const swiper = new Swiper('.heroSwiper', {
            //     loop: false,
            //     pagination: {
            //         el: '.swiper-pagination',
            //     }
            // });

        });

        function cardData() {
            $('#dataTable').DataTable({
                "bLengthChange": false,
                "pageLength": 6,
                "ajax" : "controller/controller.home_page.php?mode=cardDatalist",
                "columns" : [
                    { "data" : "card_title" },
                    { "data" : "content" },
                    { "data" : "card_status" },
                    { "data" : "date_update" },
                    { "data" : "action" }
                ]
            });
        }

        function update(card_id, card_title, img, content, link, card_status) {
            $('.updateCardContent').modal('show');
            $('#modalTitle').html('<i class="fas fa-sm fa-edit"></i> ' + card_title);

            $('#card_id').val(card_id);
            $('#card_title').val(card_title);
            $('#card_content').summernote('code', content);
            $('#link').val(link);
            $('#status').val(card_status);

            if (img != "") {
                $('div #thumbnail-container').removeClass('img-thumbnail-container');
                $('#card-image').addClass('team-img');
                $('#card-image').attr('src', img);
            } else {
                $('div #thumbnail-container').addClass('img-thumbnail-container');
                $('#card-image').removeClass('team-img');
                $('#card-image').attr('src', img);
            }

            $('.resetBtn').on('click', function() {
                $('input[type=text], input[type=url]').val('');
                $('#status').val(0);
                $('#card_content').summernote('code', '');
            });
        }

        function heroData() {
            $('#dataHeroImage').DataTable({
                "bLengthChange": false,
                "pageLength": 5,
                "ajax" : "controller/controller.home_page.php?mode=heroDatalist",
                "columns" : [
                    { "data" : "img" },
                    { "data" : "title" },
                    { "data" : "link" },
                    { "data" : "sort_by" },
                    { "data" : "status" },
                    { "data" : "date_update" },
                    { "data" : "action" }
                ]
            });
        }

        function updateHero(id, img, title, link_title, link, sort_by, status) {
            $('.heroImgModal').addClass('updateHeroImage').modal('show');
            $('#modalForm').attr('action', 'controller/controller.home_page.php?mode=updateHeroImg');
            $('#modalTitleHero').html('<i class="fas fa-sm fa-edit"></i> ' + title);

            $('#hero_id').val(id);
            $('#title').val(title);
            $('#link_title').val(link_title);
            $('#url').val(link);
            $('#sort_by').val(sort_by);
            $('#status').val(status);

            if (img != "") {
                $('#hero-image').attr('src', img).addClass('w-100 p-1');
                $('.note').text(img).addClass('p-2').css({'color' : 'blue'});
            } else {
                $('#hero-image').attr('src', 'assets/img/hero-tumbnail.jpg').addClass('w-100 p-1').css({'border' : '2px solid black'});
                $('.note').text('No Available Image').addClass('p-2').css({'color' : 'red'});
            }

            $('.closeBtn').on('click', function() {
                $('.heroImgModal').removeClass('updateHeroImage');
                $('#modalForm').attr('action', '');
            });

            $('.resetBtn').on('click', function() {
                $('input[type=text], input[type=url]').val('');
                $('input[type=number]').val(0);
                $('#status').val(0);
            });
        }

        function deleteHero(id) {
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
                        url: 'controller/controller.home_page.php?mode=deleteHeroImg',
                        method: 'POST',
                        data: {
                            id:id
                        },
                        success: function(response) {
                            $('#preloader').show();
                            var resValue = jQuery.parseJSON( response );

                            if(resValue['message'] == "Delete Success") {
                                Swal.fire(
                                    'Deleted Successfully!',
                                    '',
                                    'success'
                                ).then(function(){
                                    window.location.href = "home_page.php";
                                });
                            } else  {
                                Swal.fire(
                                    'Error!',
                                    'Opps! Something went wrong.',
                                    'error'
                                ).then(function(){
                                    window.location.href = "home_page.php";
                                });
                            }

                        }
                    })
                }
            })
        }

        function addHeroImg() {
            $('#addImageHero').on('click', function() {
                $('.heroImgModal').addClass('addHeroImage').modal('show');
                $('#modalForm').attr('action', 'controller/controller.home_page.php?mode=addHeroImg');
                $('#modalTitleHero').html('<i class="fas fa-plus"></i> Add Image');

                $('input[type=text], input[type=url]').val('');
                $('input[type=number]').val(0);
                $('#status').val(0);

                $('#hero-image').attr('src', 'assets/img/hero-tumbnail.jpg').addClass('w-100 p-1').css({'border' : '2px solid black'});
                $('.note').text('No Available Image').addClass('p-2').css({'color' : 'red'});
                $('input[type=number]').val(0);

                $('.closeBtn').on('click', function() {
                    $('.heroImgModal').removeClass('addHeroImage');
                    $('#modalForm').attr('action', '');
                });

                $('.resetBtn').on('click', function() {
                    $('input[type=text], input[type=url]').val('');
                    $('input[type=number]').val(0);
                    $('#status').val(0);
                });
            });
        }

        function addCardContent() {
            $('#addCard').on('click', function() {
                $('.cardContentModal').addClass('addHeroImage').modal('show');
                $('#modalCardForm').attr('action', '');
                $('#modalTitle').html('<i class="fas fa-plus"></i> Add Card');

                $('input[type=text], input[type=url]').val('');
                $('input[type=number]').val(0);
                $('#status').val(0);

                $('.closeBtn').on('click', function() {
                    $('.heroImgModal').removeClass('addHeroImage');
                    $('#modalForm').attr('action', '');
                });

                $('.resetBtn').on('click', function() {
                    $('input[type=text], input[type=url]').val('');
                    $('input[type=number]').val(0);
                    $('#status').val(0);
                });
            })
        }
    </script>

</body>

</html>
