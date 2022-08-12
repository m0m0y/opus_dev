<?php
$title = "Early Learning Ages - Opus Academy";
require_once "assets/common/header.php"; 
require_once "admin/model/model.early_learning.php";
require_once "admin/model/model.card.php";

$earlyLearning = new EarlyLearning();
$card = new Cards();

$earlyLearning = $earlyLearning->getEarlyLearningContent();

$page_url =  $_SERVER["REQUEST_URI"];
$pages = explode("/", $page_url);
$page = $pages[2];

$cardContent = $card->getContentWhere($page);
?>

<style>
    /*--------------------------------------------------------------
# Early learning Program
--------------------------------------------------------------*/
/* body * {
  outline: 1px solid red;
}   */

.early-bg{
  background-color:#3666f2;
}
.early-content h1 { /*first pic with column */
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 38px;
    padding-left: 100px;
    font-family: "Poppins", sans-serif;
    color: white;
    margin-top: 60px;
}
.early-content p { /*first pic with column */
  font-size: 20px;
  font-weight: 300;
  margin-bottom: 20px;
  padding-left: 100px;
  font-family: "Poppins", sans-serif;
  color: white;
}
.early img { /*first pic with column */
    width: auto;
    height: 750px;
    margin-left: 65px;
}
.early-title p{
    font-size:20px
}
.custom-badge span{
  display: inline-block;
  padding: 7px 15px;
  background: #f5f5f5;
  margin-right: 10px;
  font-size: 15px;
  margin-bottom: 10px;
  border-radius: 4px;
}
.royal img {
    width: 50%;
    height: auto;
    position: relative;
    bottom: 20px;
}
.west img {
    width: 77%;
    height: auto;
    margin-left: -120px;
}
.early-achievement{
    color: #0d6efd;
    background-color: #fff;
    margin-left: 100px;
    padding: 20px;
    font-size: 24px;
    width: 50%;
    font-weight: 400;
    height: auto;
    border-color: #fff;
}
.early-appointment {
    color: #0d6efd;
    background-color: #fff;
    margin-left: 100px;
    padding: 20px;
    font-size: 24px;
    width: 30%;
    font-weight: 400;
    height: auto;
    border-color: #fff;
}
.early-trophy img {
    width: 100%;
    height: 700px;
    margin-left: 8px;
}

</style>

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li>Program</li>
            <li>Early Learning</li>
        </ol>

        <h2>Early Learning Program</h2>
        </div>
    </section>

<section>
    <div class= "container text-left early-content early-bg">
        <div class = "row">
            
                <div class = "col-md-6 section-content">
                    <h1>Pre-school learning is integral to a child's school success.</h1>
                    <p>Enrich your child's playtime with fun and educational activities at Opus Academy! Our Early Learning program promotes academic development and school readiness in an encouraging and fun environment focused on preparing them for grade school and encouraging an enthusiasm for lifelong learning. We believe in combining active play with structured educational activities, placing emphasis on language arts, reading readiness through phonics, as well as speaking skills, math, and printing. Your child will learn how to look at books, love them, and recognize how printed words convey meaning.<p>
                    <div class = text-center><a href ="#press"> <i class="bi bi-chevron-compact-down  mx-auto"></i></a></div>
                </div>

                <div class = "col-md-6 early">
                    <img src = "assets/img/portfolio/p-17.jpg">
                </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                    <h1>Early Learning Program</h1>

                    <div class="kid">
                    <img src = "assets/img/portfolio/p-18.jpg" class="w-50">
                    <button type="button" class="btn btn-primary btn-md mt-4 w-50 ms-0 ">Learn More</button>
                    </div>
            </div>

            <div class="col-md-6 early-title mt-5">
                <p>The early learning speech syllabus of the London College of Music. This program is designed to encourage young students with their speech abilities and assess their talents at early stages of development. The goal is to expand young children’s interactive oral communication skills and confidence.<br><br> Class Size: Private, Group or Pair<br>Formats: In-Centre<br>Ages: 3-6<br>Courses Offered: Exam Based or Non-exam Based<br><br></p><br><br>
            <p>Class Size: Group<br>
                Formats: Online or Online with students in-Centre<br>Grades: 6-12<br>Courses Offered: Public Forum Novice, Public Forum Varsity, Policy Debate<br></p>

                <h2>In these classes, young children will learn to:</h2><br>

                <p class="custom-badge">
                    <span>Vocal Technique</span>
                    <span>Improvisation and Impromptu Speaking</span>
                    <span>Story Telling</span>
                    <span>Public Speaking</span>
                    <span>Mime & Creative Movement</span>
                    <span>Play Reading and Dramatization </span>
                    <span>Acting Styles</span>
                    <span>Oral Interpetation (poetry and prose)</span>
                    <span>Scene Study</span>
                    <span>Shakespeare</span>     
                </p><br>

                <h1><strong>Certificate Granting:</strong></h1><br>

                <div class="row me-0">
                    
                    <div class="col-md-6 royal p-0">
                        <img src="assets/img/portfolio/l-1.png">
                    </div>

                    <div class="col-md-6 west">
                        <img src="assets/img/portfolio/l-2.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container text-left mt-5 section-bg">
        <div class="row">
                <div class="col-md-6 mt-5 ps-5 text-left section-title">
                    <h1><strong>Why exams for early learning?</strong></h1><Br>
                    <ul class= "text-left font ps-5 p-5">
                        <li>Provides an opportunity for young children to perform in an exam situation that will help them prepare for future exams, competitions, and interviews.</li>
                        <li>Learn speaking and memorization of poetry, basic mime scenes, holding a conversation and discussion.</li>
                        <li>Focus on enjoyment of speech arts and imaginative responses.</li>
                    </ul>
                    <button type="button" class="text-btn btn-primary early-achievement"><b>Our Achievement</b></button>
                </div>

                <div class = "col-md-6 early early-trophy">
                    <img src = "assets/img/portfolio/p-19.PNG">
                </div>
                
                <div class="container clearfix booking ">
                    <div class=" section-title pb-0 me-md-5 mt-5 text-center booking ">
                        <h4>Give your child the opportunity to learn and speak with confidence, clarity, and conviction!</h4>
                        <button type="button" class="text btn btn-primary early-appointment m-5"><b>Book an Apointment now</b></button>
                    </div>
                </div>
        </div>
    </div>
</section>


</main>

<?php
require_once "assets/common/footer.php"; 
?>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<script src="assets/js/main.js"></script>

</html>