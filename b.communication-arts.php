<h2 class="text-left">Effective spoken</h2> 
            <h2 class="text-left">communication is critical for success in today's highly competitive world.</h2>
            <h2 class="text-left"></h2>
            <h2 class="text-left"> </h2> 
            <p> At opus, we are commited to teachin studetns the art of public speaking,debate, soeech arts and drama to develop their creativity and expression.Our goal is to train students of all ages to speak and perform with self assurance, empowering them for a lifetime of success in their and professional lives.</p>
<p>At opus, we are commited to teachin studetns the art of public speaking,debate, soeech arts and drama to develop their creativity and expression.Our goal is to train students of all ages to speak and perform with self assurance, empowering them for a lifetime of success in their and professional lives.</p>
<p class="col-md-6 float-md-end ms-md-3 p-end-3">Time and again, science has proven that strong emotional intelligence in children leads to better decision making, motivation, and a heightened sense of self-awareness going forward in life. These factors are a pivotal foundation benefiting.all young people, providing them with the fortitude required to succeed personally and professionally.This program is especially designed to present a multitude of skills necessary for positive personality development and strengthened emotional intelligence. Students will develop stronger communication skills, organizational goals, and gain essential leadership skills. They will study the essential qualities of a leader and learn conflict resolution skills through understanding social concepts and dynamics. In addition, this program prepares young people to present themselves well in a variety of social situations and at job interviews. The practical side of our courses are designed to increase knowledge and appreciation of good manners and etiquette, improving self-esteem, and respecting others. </p>
// foreach($communicationArtsContent as $v) {
    //     $section = $v["section"];
    //     $title = $v["title"];
    //     $content = $v["content"];
    //     $status = $v["status"];

    //     if($status == 0) {

    //         if($section == "Section I") {
    //             ?>

    <!-- //             <section id="portfolio" class="portfolio">
    //                 <div class="container">

    //                     <div class="section-title">
    //                         <h4><?= $title ?></h4>
    //                     </div>

    //                     <?= $content ?>
                        
    //                     <div class="row portfolio-container mt-5">

    //                         <div class="col col-sm-8 d-flex">
    //                             <img src="assets/img/portfolio/p-8.jpg" class="mb-5" alt="" style="width: 100%;">
    //                         </div>

    //                         <div class="col col-sm-4 d-flex">
    //                             <img src="assets/img/portfolio/p-7.jpg" class="mb-5" alt="" style="width: 100%;">
    //                         </div>

    //                         <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
    //                             <img src="assets/img/portfolio/p-1.jpg" class="mb-5" alt="" style="width: 100%;">
    //                             <img src="assets/img/portfolio/p-4.jpg" class="mb-5" alt="" style="width: 100%;">
    //                         </div>

    //                         <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
    //                             <img src="assets/img/portfolio/p-3.jpg" class="mb-5" alt="" style="width: 100%;">
    //                             <img src="assets/img/portfolio/p-5.jpg" class="mb-5" alt="" style="width: 100%;">
    //                         </div>

    //                         <div class="col col-12 col-lg-4 col-md-6 portfolio-item">
    //                             <img src="assets/img/portfolio/p-2.jpg" class="mb-5" alt="" style="width: 100%;">
    //                             <img src="assets/img/portfolio/p-6.jpg" class="mb-5" alt="" style="width: 100%;">
    //                         </div>

    //                     </div>
                        
    //                 </div>
    //             </section> -->

    //              <?php
    //         }

    //     }

    // }
    <section id="ourCourses" class="ourCourses">
    <div class="container section-bg mr-5">

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
                            <div class="icon"></div>
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










/*Afteer table*/



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


    We Offer a wide selection of Speech & Drama syllabi tailored to your child's individuals needs and interests.Student learn through a structured framework and partake in a series of graded examinations leading to a diploma.Students can choose diffrent syllabi strands from internationalcertification board such as Royal Conservatory of Music (Canada), London College of music (UK) and Trinity College of London (UK).Significant long-term benefits includethe potential of various courses counting towards high school, as well as performance opportunities including recitals, workshops, festivals and competitions. 
    
    At Opus,we pride  ourselves on our comprehensive program, allowing students to discover their own voices through a creative mix of prose, poetry, drama, storytelling, and imporivasation. At Opus, Students learn to interpret and perform a variety of literary forms from western classical and modern literature.Our courses build on a young learner's expressive potential and teaches the accompanying vocabulary and language skills necessary for appreciating and performing various litery art forms.Alongside impovisation techniques, drama games, and other activities to stimulate their imaginations,we help young learners build their character through exressive movement and voice.Students learn relaxation methods, proper breathing techniques, as well as projection and articulation.    
    Class Size:Private,Group or  Pair 
    Format:Online or In-Centre
    Grades: K-12
    Courses Offered:Exam Based or Non-exam Based
