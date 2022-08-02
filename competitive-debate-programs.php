<?php 
$title = "Harvard Debate Program - Opus Academy";
require_once "assets/common/header.php"; 
require_once "admin/model/model.competitive_debate.php";

$competitiveDebate = new CompetitiveDebate();
$competitiveDebateContent = $competitiveDebate->getContent();
?>

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs mb-0">
        <div class="container">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li>Program</li>
            <li>Competitive Debate Programs</li>
        </ol>
        <h2>Opus Competitive Debate Programs</h2>
        </div>
    </section>

    <section id="debate-programs-page-hero" class="d-flex flex-column justify-content-center align-items-center">
    </section>

    <?php 
        foreach ($competitiveDebateContent as $v) {

            $section = $v["section"];
            $title = $v["title"];
            $content = $v["content"];
            $status = $v["status"];

            if($status == 0) {
                if($section == "Section I") {
                    ?>
                    <section class="competitive-debate-programs">
                        <div class="container">

                            <!-- <h3><?= $title ?></h3> -->
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

                    <section class="why-learn-to-debate">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>
                            
                            <?= $content ?>

                            <br>

                            <?php 
                                if(isset($_GET["canada"])) {
                                    echo '
                                    <a href="assets/pdf/harvard-debate-canada.pdf" target="blank" class="text-decoration-underline">Click to download our Harvard Debate Council Flyer</a>
                                    ';
                                } else {
                                    echo '
                                        <a href="assets/pdf/Harvard-Debate-Council-Flyer-updated-March-2022-pages-1.pdf" target="blank" class="text-decoration-underline">Click to download our Harvard Debate Council Flyer</a>
                                        <br><br>

                                        <a href="assets/pdf/Application Procedure for Harvard Debate Council workshops (revised May 17,2022).pdf" target="blank" class="text-decoration-underline">Download Application procedure for Harvard Debate Council</a>
                                        <br><br>
                                        
                                        <a href="https://www.jotform.com/form/210461467411044" target="blank" class="text-decoration-underline">Apply Application for 2022 is now open. Click here to Apply!</a>
                                        <br><br>

                                        <a href="assets/pdf/Philippines_HarvardDebate_TeacherEvaluation.pdf" target="blank" class="text-decoration-underline">Download Teacher Evaluation.</a>
                                    ';
                                }
                            ?>
                         

                        </div>
                    </section>
                    <?php
                }

                else if ($section == "Section III") {
                    ?>
                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="why-learn-with-us">
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

                    <section class="our-program-structure">
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

                    <section class="academy-and-harvard-debate-council">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>
                            
                            <?= $content ?>

                        </div>
                    </section>
                    <?php
                }

                else if ($section == "Section VI") {
                    ?>
                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="harvard-debate-council-program">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>
                            
                            <?= $content ?>

                        </div>
                    </section>
                    <?php
                }

                else if ($section == "Section VII") {
                    ?>    
                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="competitive-debate-opus">
                        <div class="container">

                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>
                            
                            <?= $content ?>

                        </div>
                    </section>
                    <?php
                }

                else if ($section == "Section VIII") {
                    ?>
                    <div class="container">
                        <hr></hr>
                    </div>

                    <section class="speech-and-debate-transform">
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