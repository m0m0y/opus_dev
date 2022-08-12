<?php 
$title = "Harvard Debate Program - Opus Academy";
require_once "assets/common/header.php"; 
require_once "admin/model/model.competitive_debate.php";

$competitiveDebate = new CompetitiveDebate();
$competitiveDebateContent = $competitiveDebate->getContent();
?>
<style>
    /*# Competitive Program
--------------------------------------------------------------*/
/* body * {
  outline: 1px solid red;
}   */
.competitive-bg{
  background-color:#b1233d;
}
.competitive-content h1 { /*first pic with column */
    /* font-size: 42px; */
    /* font-weight: 700; */
    /* margin-bottom: 38px;
    padding-left: 100px; */
    /* font-family: "Poppins", sans-serif; */
    color: white;
    /* margin-top: 60px; */
}
.competitive-content p { /*first pic with column */
  font-size: 20px;
  font-weight: 300;
  margin-bottom: 20px;
  padding-left: 100px;
  font-family: "Poppins", sans-serif;
  color: white;
}
.competitive img { /*first pic with column */
    width: auto;
    height: 650px;
    margin-left: 120px;
}
.competitive-title p{
    font-size:20px
}
.kid img {
    height: auto;
    width: 340px;
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
.competitive-tb-bg {
    background-image: url(assets/img/portfolio/p-23.jpg);
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.competitive-apointment {
    color: #0d6efd;
    background-color: #fff;
    margin-left: 100px;
    padding: 20px;
    font-size: 24px;
    width: 35%;
    font-weight: 400;
    height: auto;
    border-color: #fff;
}
</style>

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs pb-0">
        <div class="container">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li>Program</li>
            <li>Competitive Debate Programs</li>
        </ol>
        <h2>Opus Competitive Debate Programs</h2>
        </div>
    </section>
    
    <div class="container p-0 text-left competitive-content competitive-bg">
        <div class="row">
            <div class = "col-md-6 section-content">
                <h1 class="mt-5 px-5 pb-3 pt-5 fw-bold">In partnership with the Harvard Debate Council bringing you the best debate learning experience.</h1>
                <p>Learn from the master coaches from the Harvard Debate Council! Opus Academy is proud to be in partnership with Harvard Debate Council, providing the opportunity for students to train with the world's leading experts in international debate practices.<p>
                <div class = text-center><a href ="#press"> <i class="bi bi-chevron-compact-down  mx-auto"></i></a></div>
            </div>

            <div class = "col-md-6 competitive">
                <img src = "assets/img/portfolio/p-20.jpg">
            </div>
        </div>
    </div>

<section>
    <div class="container">
        <div class ="row">
            <div class="col-6 mt-5">
                <h1>Harvard Competitive Debate</h1>
                <img src = "assets/img/portfolio/p-21.png" class="ms-5 w-50">

                <div class="row">
                    <div class="col-md-4 ">
                        <button type="button" class="btn btn-danger p-2 btn-lg w-100">Register Fall 2022</button>
                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger p-2 btn-lg w-100 me-0">Courses Schedule</button>
                    </div>
                </div>
            </div>
            <div class="col-6 pt-5 mt-5 competitive-title">
                <br><p>The Harvard Debate Program is Opus Academy’s U.S. style debate program developed from our exclusive partnership with the Harvard Debate Council (HDC). Established for over 35 years, the HDC instructors have reached the highest levels of competitions as both coaches and competitors with international experience. They share a spirit of wanting to help students from around the world benefit from debate. Give your child the opportunity of a lifetime— empower future leaders through speech and debate. Learn to Speak! Speak to Learn! Speak with power, confidence, clarity, and conviction!Through debate, students deepen their understanding of the world and look for solutions to local, national, and global issues. Early debate training helps students listen carefully, think logically, and speak effectively. Students sharpen their reasoning and problem-solving skills by studying how to construct arguments, defend them through refutation, and cross-examine others. Debate teaches life skills essential to future success and is applicable to most any future career choice.</p><br>
                <h1><strong>Certificate Granting For Completion</strong></h1><br>
                <div class="row">
                    <div class="col-sm-6">
                    <img src = "assets/img/portfolio/p-21.png" class="w-50">
                    </div>

                    <div class="col-sm-6">
                    <img src = "assets/img/portfolio/p-22.png" class="w-25">
                    </div><br>
                    <h2>Program Structure</h2><br><br><br>
                    <p>Our first-class debate program provides students with the knowledge, skills, and technique necessary to master debate. Through a well-designed sequential program consisting of core concepts, established methodology, and universal elements, students develop the ability to debate using logic, argumentation, and refutation the hallmarks of any successful debater.</p>
                        <p class="custom-badge">
                        <span>Core Concepts</span>
                        <span>Methodology</span>
                        <span>Elements</span>
                    </p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class ="container competitive-tb-bg mb-5">
        <div class="text-center competitive-content mb-5"><br>
            <h1 class ="mt-5">We Teach U.S. Debate Styles</h1>
        </div>

    <div class="row p-5">
                <div class="col-md-6 mb-5">
                    <div class="p-5 pb-4 mb-5 m-5 bg-light text-left competitive-title">
                        <h1 class = "text-center"><strong>Public Forum</strong></h1><br>
                        <p>Public Forum has rapidly become the most popular format of debate both in the United States and internationally. In a public forum debate round, two teams of two students debate for approximately 45 minutes on a national topic that changes throughout the school year. Students will debate several topics over the course of the year and will prepare for regular tournament competitions.</p>
                    </div>
                </div>
                
                <div class="col-md-6 mb-5">
                        <div class="p-5 pb-5 m-5 bg-light text-left competitive-title">
                            <h1 class = "text-center"><strong>Policy Debate</strong></h1><br>
                            <p>one of the oldest forms of debate competition most common to US high schools and US universities, is also the format favoured for the Harvard Debate Council competitions. In a policy debate round, two teams of two debate for approximately one hour and thirty minutes on an annual national topic related to domestic and/or international policy.</p>
                        </div>
                </div>
    </div>
</section>

<section>
<div class="container mb-5">
    <div class="row">
        <div class="col-6">
            <img src="assets/img/portfolio/p-24.JPG" class="w-100">
        </div>

        <div class="col-6 section-title text-left">
            <div class ="m-4 ps-5">
        <h2><strong>Competitive Debate at Opus Academy<strong></h2>
        <p>We train serious debaters to compete in regional, national, and international tournaments. Students learn advanced skills and sharpen their debate abilities in various styles and formats while learning in-depth issues.</p>
        <button type="button" class="text btn btn-primary p-4 w-75"><b>Our Recent Competition Results</b></button>
            </div>

        </div>

    </div>
</div>
</section>

<section>
    <div class="container text-left competitive-title section-bg">

        <div class="row">
            <div class="col-md-6">
                <div class="p-5 pb-4 mb-5 m-5  text-left competitive-title pe-0">
                            <h1><strong>Why Learn with Us?</strong></h1>
                        <div class="pt-5 text-left">
                            <p>✔ Exclusive partnership with Harvard Debate Council</p>
                            <p>✔ Top - level Harvard Debate Instructors</p>
                            <p>✔ College Prowler</p>
                            <p>✔ Highly developed Curriculum</p>
                            <p>✔ Years of Excellence (Harvard Debate Council: established over 35 years and Opus Academy: established over 16 years)
                            <p>✔ Excellent student-faculty ratio</p>
                            <p>✔ Harvard Debate Council Certificate of completion of program</p>
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <img src="assets/img/portfolio/p-25.PNG" class="w-100">
            </div>
        </div>
    </div>
</section>

<section>
<div class="container clearfix booking ">
    <div class="section-title p-5 text-center booking">
        <h4 class = "mt-5"><strong>Empower future leaders through speech and<br> debate.Learn to Speak! Speak to Learn!</strong></h4>
        <button type="button" class="text btn btn-light competitive-apointment m-5"><b>Book an Apointment now</b></button>
    </div>
</div>
</section>
</main>

<?php require_once "assets/common/footer.php"; ?>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<script src="assets/js/main.js"></script>

</html>