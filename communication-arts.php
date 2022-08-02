<?php
$title = "Communication Arts - Opus Academy";
require_once "assets/common/header.php";
require_once "admin/model/model.communication_arts.php";

$communicationArts = new CommunicationArts();

$communicationArtsContent = $communicationArts->getContent();
$ourCourse = $communicationArts->getCourses();
?>

<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li>Programs</li>
            <li>Communication Arts</li>
        </ol>
        <h2>Opus Communication Arts</h2>
        </div>
    </section>

    <?php 
    foreach($communicationArtsContent as $v) {
        $section = $v["section"];
        $title = $v["title"];
        $content = $v["content"];
        $status = $v["status"];

        if($status == 0) {

            if($section == "Section I") {
                ?>

                <section id="portfolio" class="portfolio">
                    <div class="container">

                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                        
                        <div class="row portfolio-container mt-5">

                            <div class="col col-sm-8 d-flex">
                                <img src="assets/img/portfolio/p-8.jpg" class="mb-5" alt="" style="width: 100%;">
                            </div>

                            <div class="col col-sm-4 d-flex">
                                <img src="assets/img/portfolio/p-7.jpg" class="mb-5" alt="" style="width: 100%;">
                            </div>

                            <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
                                <img src="assets/img/portfolio/p-1.jpg" class="mb-5" alt="" style="width: 100%;">
                                <img src="assets/img/portfolio/p-4.jpg" class="mb-5" alt="" style="width: 100%;">
                            </div>

                            <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
                                <img src="assets/img/portfolio/p-3.jpg" class="mb-5" alt="" style="width: 100%;">
                                <img src="assets/img/portfolio/p-5.jpg" class="mb-5" alt="" style="width: 100%;">
                            </div>

                            <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
                                <img src="assets/img/portfolio/p-2.jpg" class="mb-5" alt="" style="width: 100%;">
                                <img src="assets/img/portfolio/p-6.jpg" class="mb-5" alt="" style="width: 100%;">
                            </div>

                        </div>
                        
                    </div>
                </section>

                <?php
            }

        }

    }
    ?>

    <section id="ourCourses" class="ourCourses section-bg">
        <div class="container">

            <div class="section-title">
                <h2 class="text-center">Our Courses</h2>
            </div>

            <div class="row">
                <?php
                foreach($ourCourse as $v) {
                    $course = $v["course"];
                    $status = $v["status"];

                    if($status == 0) {
                        ?>

                        <div class="col-lg-4 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-activity"></i></div>
                                <h5><a href=""><?= $course ?></a></h5>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <?php 
    foreach($communicationArtsContent as $v) {
        $section = $v["section"];
        $title = $v["title"];
        $content = $v["content"];
        $status = $v["status"];

        if($status == 0) {

            if($section == "Section II") {
                ?>

                <section id="communicationArts" class="communicationArts">
                    <div class="container">

                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                        
                    </div>
                </section>

                <?php
            }

            else if($section == "Section III") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="certificate-and-diploma" class="certificate-and-diploma">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section IV") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="public-speaking" class="public-speaking">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section V") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="certificate-and-diploma-grant" class="certificate-and-diploma-grant">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section VI") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="interview-skills-program" class="interview-skills-program">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section VII") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="youth-lead-program" class="youth-lead-program">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section VIII") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="international-relations" class="international-relations">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section IX") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="awards-and-honor" class="awards-and-honor">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

            else if($section == "Section X") {
                ?>

                <div class="container">
                    <hr></hr>
                </div>

                <section id="speech-competitions-festivals" class="speech-competitions-festivals">
                    <div class="container">
                        <div class="section-title">
                            <h4><?= $title ?></h4>
                        </div>

                        <?= $content ?>
                    </div>
                </section>

                <?php
            }

        }

    }

    ?>
</main>

<?php require_once "assets/common/footer.php"; ?>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<script src="assets/js/main.js"></script>

</html>