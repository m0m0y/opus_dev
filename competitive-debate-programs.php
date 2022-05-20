<?php 
$title = "Harvard Debate Program - Opus Academy";
require_once "assets/common/header.php"; 
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

    <section class="competitive-debate-programs">

        <div class="container">

            <div class="content">
                <h3 class="text-center text-white py-3">In partnership with Harvard Debate Council Bringing you <br> the best debate learning experience</h3>

                <center>
                    <img src="assets/img/hero/opus-tran.png" alt="harvard-img" width="15%">
                </center>
                
                <br><br>

                <h3 class="text-center">Opus Competitive Debate Programs</h3>
                <h6 class="text-center">Empowering future leaders through speech and debate</h6>
                <h6 class="text-center">Learn to Speak! Speak to Learn!</h6>
                <h6 class="text-center">Speak with power, confidence, clarity and conviction!</h6>
            </div>

        </div>

    </section>

    <section class="why-learn-to-debate">

        <div class="container">
            <div class="section-title">
                <h4>Why learn to debate ?</h4>
            </div>

            <p>The art of debate has been a defining part of Western culture since the ancient Greeks. Through debate, students deepen their understanding of the world and look for solutions to local, national and global issues. Early debate training helps students listen carefully, think logically and speak effectively. Students sharpen their reasoning and problem-solving skills by studying how to construct arguments, defend them through refutation, and cross-examine others. Debate teaches life skills essential to future success and is applicable to most any future career choice.</p>

            <p>Research shows that students who practice debate perform better academically, attain higher standardized test scores, gain increased college admissions, and achiever greater success in their careers. </p>

            <?php 
            if (isset($_GET["canada"])) {
                ?>
                <a href="assets/pdf/harvard-debate-canada.pdf" target="blank" class="text-primary">Click to download our Harvard Debate Council Flyer</a>
                <?php
            } else {
                ?>
                <a href="assets/pdf/Harvard-Debate-Council-Flyer-updated-March-2022-pages-1.pdf" target="blank" class="text-primary">Click to download our Harvard Debate Council Flyer</a>

                <br><br>

                <a href="assets/pdf/Application Procedure for Harvard Debate Council workshops (revised May 17,2022).pdf" target="blank" class="text-primary">Download Application procedure for Harvard Debate Council</a>

                <br><br>

                <a href="https://www.jotform.com/form/210461467411044" target="blank" class="text-primary">Apply Application for 2022 is now open. Click here to Apply!</a>

                <br><br>

                <a href="assets/pdf/Philippines_HarvardDebate_TeacherEvaluation.pdf" target="blank" class="text-primary">Download Teacher Evaluation</a>.

                <?php
            }
            ?>
        </div>

    </section>

    <div class="container">
        <hr></hr>
    </div>

    <section class="why-learn-with-us">

        <div class="container">
            <div class="section-title">
                <h4>Why learn to debate ?</h4>
            </div>

            <p>The Harvard Debate Council instructors have reached the highest levels of competitions as coaches and competitors. They share a spirit of wanting to help students from around the world benefit from debate!</p>

            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary" aria-current="true">Exclusive partnership with <b>Harvard Debate Council</b></li>
                    <li class="list-group-item">Top-notch Instructions</li>
                    <li class="list-group-item">College Prowler</li>
                    <li class="list-group-item">Highly developed Curriculum</li>
                    <li class="list-group-item">Years of Excellence <b>(Harvard Debate Council: established over 35 years and Opus Academy: established over 16 years)</b></li>
                    <li class="list-group-item">Excellent student-faculty ratio</li>
                </ul>
            </div>

            <br>

            <p>Provide your child with the opportunity of a lifetime</p>
        </div>

    </section>

    <div class="container">
        <hr></hr>
    </div>

    <section class="our-program-structure">

        <div class="container">
            <div class="section-title">
                <h4>Our Program Structure</h4>
            </div>

            <p>Our first-class debate program provides students with the knowledge, skills, and technique necessary to master debate. Through a well-designed sequential program consisting of core concepts, established methodology, and universal elements, students develop the ability to debate using logic, argumentation, and refutation - the hallmarks of any successful debater.</p>

            <div class="container mt-4">
                <div class="row">

                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true"><b>Core Concepts</b></li>
                            <li class="list-group-item">-	Public Speaking Skills</li>
                            <li class="list-group-item">-	Logical Reasoning and Argumentation</li>
                            <li class="list-group-item">-	Rhetoric</li>
                            <li class="list-group-item">-	Current Events</li>
                            <li class="list-group-item">-	Extemporaneous Speaking</li>
                            <li class="list-group-item">-	Teamwork and Leadership</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true"><b>Methodology</b></li>
                            <li class="list-group-item">-	Instruction & Skill Development </li>
                            <li class="list-group-item">-	Critical Discussion  </li>
                            <li class="list-group-item">-	In-depth Topic Research  </li>
                            <li class="list-group-item">-	Debate Practices</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true"><b>Elements</b></li>
                            <li class="list-group-item">-	Definition and Value of Debate</li>
                            <li class="list-group-item">-	Case Construction: evidence, argumentation, structure</li>
                            <li class="list-group-item">-	Research & Critical Analysis (sources, plagiarism, citations)</li>
                            <li class="list-group-item">-	Trilogy of Aristotle - Ethos, pathos, & logos</li>
                            <li class="list-group-item">-	Refutation</li>
                            <li class="list-group-item">-	Logical fallacies</li>
                            <li class="list-group-item">-	Cross-Examination</li>
                            <li class="list-group-item">-	Debate formats</li>
                            <li class="list-group-item">-	Speakers' Duties</li>
                            <li class="list-group-item">-	Language and Delivery</li>
                            <li class="list-group-item">-	Mock debates</li>
                        </ul>
                    </div>
                </div>
            </div>
        
        </div>

    </section>

    <div class="container">
        <hr></hr>
    </div>

    <section class="academy-and-harvard-debate-council">

        <div class="container">
            <div class="section-title">
                <h4>Opus Academy and Harvard Debate Council</h4>
                <small>BRINGING YOU THE BEST LEARNING EXPERIENCE IN DEBATE.</small>
            </div>

            <div class="container">
                <div class="content">
                    <h5>IN PARTNERSHIP WITH HARVARD DEBATE COUNCIL</h5>
                    <p><b>Teaching All Levels</b>-Classes are grouped according to skill level</p>

                    <p>Learn from Master Instructors through an expertly developed curriculum</p>

                    <p>Opus Academy is proud to be in partnership with Harvard Debate Council, providing the opportunity for students to train with the world’s leading experts in international debate practices. Harvard Debate Council instructors have reached the highest levels of competition as coaches and competitors, helping students from around the world learn the art of debate.</p>
                </div>
            </div>
        </div>

    </section>

    <div class="container">
        <hr></hr>
    </div>

    <section class="harvard-debate-council-program">

        <div class="container">
            <div class="section-title">
                <h4>Harvard Debate Council Programs:</h4>
            </div>

            <div class="container">
                <h5>I. Public Speaking and Argumentation</h5>

                <p>This course provides a solid foundation for communication in academic and career contexts. Students will learn the foundational elements of crafting outstanding persuasive speeches. Students will select a contemporary topic with a level of controversy and produce public policy and personal advocacy speeches.</p>

                <h5 class="mt-5">II. Public Forum </h5>

                <p>Public Forum has rapidly become the most popular format of debate both in the United States and internationally. In a public forum debate round, two teams of two students debate for approximately 45 minutes on a national topic that changes throughout the school year. Students will debate several topics over the course of the year and will prepare for regular tournament competitions.</p>

                <h5 class="mt-5">III. Policy Debate- Policy Debate</h5>

                <p>One of the oldest forms of debate competition most common to US high schools and US universities, is also the format favoured for the Harvard Debate Council competitions. In a policy debate round, two teams of two debate for approximately one hour and thirty minutes on an annual national topic related to domestic and/or international policy.</p>
            </div>
        </div>

    </section>

    <div class="container">
        <hr></hr>
    </div>

    <section class="competitive-debate-opus">

        <div class="container">
            <div class="section-title">
                <h4>Competitive Debating at Opus</h4>
            </div>

            <p>We train serious debaters to compete in regional, national, and international tournaments. Students learn advanced skills and sharpen their debate abilities in various styles and formats while learning in-depth issues.  </p>

            <p>We train students in the following debate formats:</p>

            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true">Canadian Debate Formats:</li>
                            <li class="list-group-item">-	Canadian National Debate (CNDF) </li>
                            <li class="list-group-item">-	Cross-Examination</li>
                            <li class="list-group-item">-	Parliamentary Style</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true">US Debate Formats:</li>
                            <li class="list-group-item">-	Public Forum </li>
                            <li class="list-group-item">-	Policy Debate</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary" aria-current="true">International Debate Formats:</li>
                            <li class="list-group-item">-	World Schools</li>
                            <li class="list-group-item">-	British Parliamentary</li>
                        </ul>
                    </div>

                </div>
            </div>

            <br>

            <p>Private and Group classes available</p>

            <p><b>Begin your journey now</b></p>
        </div>

    </section>

    
    <div class="container">
        <hr></hr>
    </div>

    <section class="speech-and-debate-transform">

        <div class="container">
            <div class="section-title">
                <h4>Speech and debate transform lives! Begin your journey now !</h4>
            </div>

            <center>
                <img src="assets/img/hero/hero-10.jpg" alt="opus-trophy" width="85%">
            </center>
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