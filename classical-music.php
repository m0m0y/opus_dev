<?php 
$title = "Opus Summer Camps - Opus Academy";
require_once "assets/common/header.php"; 
require_once "admin/model/model.classical_music.php";

$classicalMusic = new ClassicalMusic();
$classicalMusicContent = $classicalMusic->getContent();
?>


    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs py-3 px-5 mt-1">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Programs</li>
                    <li>Classical Music Program</li>
                </ol>
                <h2>Opus Classical Music Program</h2>
            </div>
        </section>

        <?php 
        foreach ($classicalMusicContent as $v) {

            $section = $v["section"];
            $title = $v["title"];
            $content = $v["content"];
            $status = $v["status"];

            if($status == 0) {

                if($section == "Section I") {
                    ?>

                    <section class="music-program pt-3">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>

                            <?= $content ?>

                        </div>
                    </section>

                    <?php
                }

                else if ($section == "Section II") {
                    ?>

                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="music-studies">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>

                            <?= $content ?>

                        </div>
                    </section>

                    <?php
                }

                else if ($section == "Section III") {
                    ?>

                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="course-include">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>

                            <?= $content ?>

                        </div>
                    </section>

                    <?php
                }

                else if ($section == "Section IV") {
                    ?>

                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="additional-learning-opportunities">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>

                            <?= $content ?>

                        </div>
                    </section>

                    <?php
                }

                else if ($section == "Section V") {
                    ?>

                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="application-procedure">
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
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<script src="assets/js/main.js"></script>
</html>