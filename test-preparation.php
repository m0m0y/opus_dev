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
                <h2>Test Preparation
                </h2>
            </div>
        </section>

        <div class="container primary-bg">
            <div class="row">
                <div class = "col-md-6">
                        <h1 class="text-left mt-5 px-5 pb-3 pt-5 fw-bold">Standardized test preparation helps students reach their goals.</h1><br>
                        <p class="text-left px-5 pb-5" >With Opus Academy’s test preparation programs, students will sharpen their skills to reach or even exceed their goals. Our students have seen great improvement in their scores, helping them to achieve their private school and/or college admission goals. We offer comprehensive standardized test preparation programs for the following exams, tailored for your student’s individual needs.</p><br><br><br>
                        <div class = text-center><a href ="#press"><i class="bi bi-chevron-compact-down mx-auto"></i></a></div>
                </div>
                    <div class="col-6"> 
                        <img src ="assets/img/portfolio/p-27.jpg" class="w-100 h-100 ms-3">
                    </div>
            </div>
        </div>
   
    <section>
            <div class="container">
                <div class="text-center secondary-bg">
                    <h1 class ="pt-5 fw-bold">We Help Students Prepare For a Variety of Exams</h1>
                    <div class="row m-5">
                        
                        <div class="col-sm-3 p-5">
                            <img src = "assets/img/portfolio/c1.png"class = "w-50">
                            <img src = "assets/img/portfolio/c11.png" class = "w-75 mt-5">
                        </div>

                        <div class="col-sm-3 p-5">
                        <img src = "assets/img/portfolio/c2.png" class = "w-50"><br><br><br>
                        <img src = "assets/img/portfolio/c22.png" class = "w-75 mt-5">
                        </div>

                        <div class="col-sm-3 p-5">
                        <img src = "assets/img/portfolio/c3.png" class = "w-75 mt-5"><br><br><br><br>
                        <img src = "assets/img/portfolio/c33.png" class = "w-75  ">
                        </div>

                        <div class="col-sm-3 p-5">
                        <img src = "assets/img/portfolio/c4.png" class = "w-50">
                        <img src = "assets/img/portfolio/c44.png" class = "w-50">
                        </div>
                    </div>

                    <div class="row m-5">

                        <div class="col-md-4">
                            <div class="white-bg shadow p-3 mb-5 bg-white rounded">

                            <h2 class ="fw-bold mb-5">Private School Entrance Exams</h2>
                                <ul  class="text-left">
                                    <li >Secondary School Admissions Test (SSAT)</li>
                                    <li>Independent School Entrance Exam (ISEE)</li><br><br>
                                </ul>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="white-bg shadow p-3 mb-5 bg-white rounded">
                                <h2 class ="fw-bold mb-5">University Entrance Exams</h2>

                                <ul  class="text-left">
                                    <li>Scholastic Aptitude Test (SAT)</li>
                                    <li>American College Testing (ACT)</li>
                                    <li>International English Language Testing</li> 
                                        System (IELTS)
                                    <li>Test of English as a Foreign Language (TOEFL)</li>
                                </ul>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="white-bg shadow p-3 mb-5 bg-white rounded">
                                <h2 class ="fw-bold mb-5">Advanced Learning </h2>
                                    <ul  class="text-right">
                                            <li>All subjects of the Advanced Placement (AP)</li>
                                            <li>Exams</li><br><br><br>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src = "assets/img/portfolio/p-24.JPG"class ="w-100">
                </div>

                <div class="col-md-6">
                    <h1 class = "fw-bold text-center">Our Teaching Methods</h1>
                    <p class = "text-left ms-5">Our test preparation courses begin with a diagnostic exam and continues with the development of a plan which is customized according to the student’s individual needs. We track student progress throughout the length of the program and administer practice exams under simulated test conditions. Test reports are used to review and identify areas for further skill strengthening as well as suggestions on how to study efficiently. Our goal is twofold: to raise students’ test scores, but also to equip them with real, lasting critical reasoning skills that will benefit students throughout their academic journey. </p>
                    <div class="d-grid gap-2 ms-5">
                        <a href="#!" type="button" class="learnmore-btn mt-5 btn-xxl p-5">See Our Testimonials</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="" class="primary-bg">
      <div class="container">
        <div class="p-5">
          <div class="row">
            <div class="col-xl-12">
                <p class="fs-1 fw-bold text-center" style="color: white;">Give your child the opportunity to improve their potential exam scores!</p>
                <center><a href="#!" type="button" class="light-btn mt-5">Book an Appointment</a></center>
            </div>
          </div>
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