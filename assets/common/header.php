<?php
require_once "controller/controller.db.php";
require_once "admin/model/model.contact_info.php";

$contactInfo = new ContactInfo();
$contactInfo = $contactInfo->getInformation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title; ?></title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Debate, Public speaking, speech, drama, acting, tutoring, private school, university admissions, educational counselling, educational counsulting, test preparation, interview skills, test preparation" name="keywords">

	<link href="assets/img/favicon.ico" rel="icon">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">

    <script src="assets/vendor/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/vendor/dist/sweetalert2.min.css">

	<script src="assets/vendor/jquery/jquery.js"></script>
</head>

<body>
	<section id="topbar" class="d-flex align-items-center">
		<div class="container d-flex justify-content-center justify-content-md-between">
			<div class="contact-info d-flex align-items-center">
				
				<?php 
					foreach($contactInfo as $v) {
						$title = $v["title"];
						$description = $v["description"];
						$status = $v["contact_info_status"];

						if($title == "Email") {
							if($status == 0) {
								echo '
									<i class="bi bi-envelope d-flex align-items-center ms-5"><span>'.$description.'</i>
								';
							}
						}
					
						if($title == "Telephone & Fax") {
							$telephone = explode("/", $description);
							if($status == 0) {
								echo '
									<i class="bi bi-telephone d-flex align-items-center"><span>'.$telephone[0].'</span></i>
								';
							}
						}
					}
				?>

			</div>

				<?php 
					foreach($contactInfo as $v) {
						$title = $v["title"];
						$description = $v["description"];
						$status = $v["contact_info_status"];

						if($title == "Vancouver Location") {
							if($status == 0) {
								echo '
								<div class="cta d-none d-md-flex align-items-center">
									<div class="contact-info d-flex align-items-center">
										<i class="bi bi-pin-map d-flex align-items-center ms-4"><span>'.$description.'</span></i>
									</div>
								</div>
								';
							}
						}
					}
				?>
				
		
		</div>
	</section>

	<header id="header" class="d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">

		<div class="logo">
			<h1>
				<a href="index.php"><img src="assets/img/logo3.jpg" alt="Opus logo" id="logo"></a>
		</h1>
		</div>

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link active" href="index.php">Home</a></li>
				<li class="dropdown"><a href="#"><span>Programs</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="communication-arts.php">Opus Communication Arts</a></li>
						<li class="dropdown"><a href="#"><span>Competitive Debate Programs</span> <i class="bi bi-chevron-right"></i></a>
							<ul>
								<li><a href="competitive-debate-programs.php?canada">Canada</a></li>
								<li><a href="competitive-debate-programs.php?ph">Phillippines</a></li>
							</ul>
						</li>
						<li><a href="mcgraw-hill-education-courses.php">McGraw Hill Education Courses</a></li>
						<li><a href="academic-enrichment.php">Opus Academic Subject Enrichment</a></li>
						<li><a href="test-preparation.php">Opus Standardized Test Preparation</a></li>
						<li><a href="early-learning.php">Opus Early Learning</a></li>
						<li><a href="classical-music.php">Opus Classical Music</a></li>
					</ul>
				</li>
				<li><a class="nav-link" href="admission-counselling.php">Admission Counselling</a></li>
				<li class="dropdown"><a href="#"><span>Summer Programs</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="summer-camps.php">Opus Summer</a></li>
						<li class="dropdown"><a href="#"><span>Pre-Collegiate Pathways</span> <i class="bi bi-chevron-right"></i></a>
							<ul>
								<li><a href="#">Canadian</a></li>
								<li><a href="assets/pdf/2021_Pre_Collegiate_Pathways_International_Explorations_C_proof.pdf">- Pre Collegiate Pathways</a></li>
								<li><a href="assets/pdf/Application_Precedure_b.pdf">- Application Procedure</a></li>
								<li><a href="https://form.jotform.com/211169418873058">- Online Form</a></li>
								<li><a href="#">Phillippines</a></li>
								<li><a href="#">- Pre Collegiate Pathways</a></li>
								<li><a href="assets/pdf/Application_Precedure_PH.pdf">- Application Procedure</a></li>
								<li><a href="https://form.jotform.com/211169418873058">- Online Form</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="history-and-team.php">History and Our Team</a></li>
						<li><a href="careers.php">Careers</a></li>
					</ul>
				</li>
				<li><a class="nav-link" href="testimonials.php">Testimonials</a></li>
				<li><a class="nav-link" href="contact.php">Contact</a></li>
				<li><a href="https://opusacademy.com/login/">Teach Works</a></li>
			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav>
		</div>
	</header>