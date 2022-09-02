<?php 
$title = "Opus Summer Camps - Opus Academy";
require_once "assets/common/header.php"; 
require_once "admin/model/model.summer_camps.php";

$summerCamps = new SummerCamps();

$summerCamps = $summerCamps->getContent();
?>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs py-3 px-5 mt-1">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Summer Programs</li>
                    <li>Summer Camps</li>
                </ol>
                <h2>Opus Summer Camps</h2>
            </div>
        </section>

        <?php
        foreach($summerCamps as $v) {
            $section = $v["section"];
            $title = $v["title"];
            $content = $v["content"];
            $status = $v["status"];

            if($status == 0) {

                if($section == "Section I"){
                    ?>
                    <section class="pt-3">
                        <div class="container">

                        <div class="section-title">
                            <h3><?= $title ?></h3>
                        </div>

                        <?= $content ?>

                        </div>
                    </section>  
                    <?php
                }

                else if($section == "Section II") {                 
                    ?>
                    <section class="pt-3">
                        <div class="container">

                         <div class="section-title">
                            <h3><?= $title ?></h3>
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