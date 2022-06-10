<?php
$title = "Standardized Test Preparation - Opus Academy";
require_once "assets/common/header.php";
require_once "admin/model/model.standard_test_preparation.php";

$testPreparation = new StandardTestPreparation();

$testPreparation = $testPreparation->getContent();
?>

    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                <li><a href="index.php">Home</a></li>
                <li>Programs</li>
                <li>Standardized Test Preparation</li>
                </ol>
                <h2>Opus Standardized Test Preparation</h2>
            </div>
        </section>

        <?php
        foreach($testPreparation as $v) {
            $title = $v["title"];
            $content = $v["content"];
            $status = $v["status"];
            ?>
            <section class="standard-test-preparation pt-3">
                <div class="container">

                    <?= ($status == 0 ? ''.$content.'' : '') ?>

                </div>
            </section>
            <?php
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