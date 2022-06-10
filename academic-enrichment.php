<?php
$title = "Academic Enrichment II - Opus Academy";
require_once "assets/common/header.php";
require_once "admin/model/model.academic_enrichment.php";

$academicEnrichment = new AcademicEnrichment();

$academicEnrichmentContent = $academicEnrichment->getContent();
?>

    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                <li><a href="index.php">Home</a></li>
                <li>Programs</li>
                <li>Academic Enrichment II</li>
                </ol>
                <h2>Opus Academic Enrichment II</h2>
            </div>
        </section>

        <?php
        foreach($academicEnrichmentContent as $v) {
            $section = $v["section"];
            $title = $v["title"];
            $content = $v["content"];
            $status = $v["status"];

            if($status == 0) {

                if($section == "Section I") {
                    ?>

                    <section class="why-learn-to-debate pt-3">
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

                    <section class="academic-subject-tutoring">

                        <div class="container">
                            
                            <div class="section-title">
                                <h4><?= $title ?></h4>
                            </div>

                            <center>
                                <img src="assets/img/academic-enrichment/tutor.jpg" alt="tutor-img" class="tutor-img">
                            </center>
                            
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