<?php

require 'vendor/autoload.php';  // Composer autoload for PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['agree_terms'])) {
        die("You must agree to the terms and privacy policy.");
    }

    // Prepare email body
    $body = "";

    if (isset($_POST['anonymous_check']) && !empty($_POST['anonymous_feedback'])) {
        $body .= "Submission Type: Anonymous\n";
        $body .= "Feedback: " . htmlspecialchars($_POST['anonymous_feedback']) . "\n";
    } elseif (isset($_POST['recognized_check']) && !empty($_POST['recognized_feedback'])) {
        $body .= "Submission Type: Recognized\n";
        $body .= "Feedback: " . htmlspecialchars($_POST['recognized_feedback']) . "\n";
        $body .= "Name: " . htmlspecialchars($_POST['name']) . "\n";
        $body .= "Email: " . htmlspecialchars($_POST['email']) . "\n";
        $body .= "Mobile: " . htmlspecialchars($_POST['mobile']) . "\n";
    } else {
        die("Invalid submission.");
    }

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sajedurtareq@gmail.com';   // Your Gmail
        $mail->Password = 'abcd efgh ijkl mnop'; // Gmail App Password (NOT your Gmail password!)
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('sajedurtareq@gmail.com', 'Feedback Form');
        $mail->addAddress('sajedurtareq@gmail.com');  // Destination Email
        $mail->Subject = 'Feedback Submission';
        $mail->Body = $body;

        $mail->send();

        echo "<script>alert('Thank you! Your feedback has been sent.'); window.location.href='share-your-thought.php';</script>";
        exit;
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.location.href='share-your-thought.php';</script>";
        exit;
    }
}
?>


<!-- HTML FORM BELOW -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BNRC - Bangladesh Nationalist Research Centre</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar px-0 px-lg-4 py-2 d-none d-lg-block">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <div class="border-end border-danger pe-3">
                            <a href="https://roadtodemocracy.com/" target="_blank" class="text-light small"><i
                                    class="fas fa-file-archive text-white me-2"></i> RTD
                            </a>
                        </div>
                        <div class="ps-3">
                            <a href="./archive/archive_home.html" class="text-light small"><i
                                    class="fas fa-archive text-white me-2"></i> Archive </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex border-end border-white pe-2">
                            <a class="btn p-0 text-primary me-3" href="https://www.facebook.com/bnrc.org"
                                target="_blank"><i class="fab fa-facebook-f text-white "></i></a>
                            <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter text-white "></i></a>
                            <a class="btn p-0 text-primary me-3" href="#"><i
                                    class="fab fa-instagram text-white "></i></a>
                            <a class="btn p-0 text-primary me-0" href="#"><i
                                    class="fab fa-linkedin-in text-white "></i></a>
                        </div>
                        <div class="input-group input-group-sm ms-2">
                            <input type="text" class="form-control" placeholder="Search"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light" type="button">
                                    <i class="fas fa-search text-white"></i></button>
                            </div>
                        </div>
                        <!-- <div class="position-relative rounded-pill ms-2">
                            <input class="form-control rounded-pill w-100 p-0 ps-2" type="text" placeholder="Search">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-0 mt-0 me-1"><i
                                    class="fas fa-search"></i></button>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-lg-0 px-md-0 px-sm-1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div id="top-logo" class="px-1 py-1 shadow shadow-1 rounded-pill">
                <a href="#" class="navbar-brand d-flex align-items-center p-0 me-0 ">
                    <img src="./img/nav-logo.png" alt="Logo BNRC">
                </a>
                <!-- <a href="#" class="navbar-brand d-flex align-items-center p-0 me-0 ">
                    <img src="./img/logo-bnrc.png" alt="Logo BNRC" class="ms-3 me-2" style="height: 65px; width: auto;">
                    <span class="d-flex flex-column me-0">
                        <small class="brand-maintext" style="font-size: 16px;">Bangladesh
                            Nationalist</small>
                        <small class="brand-maintext" style="font-size: 16px;">Research Centre</small>
                    </span>
                </a>
                <p class="mx-auto text-center pb-0 pt-0 ms-5 me-5 mt-0 mb-0 text-dark border border-1 border-bottom-2 border-start-0 border-end-0 border-top-0 border-dark"
                    style="line-height:1;">
                    <small style="font-size: 12px;"> <strong>Estd. by the auth. of Khaleda Zia 2016</strong></small>
                </p> -->
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <a href="./index.html" class="nav-item nav-link border-right active"><strong>Home</strong></a>
                    <!-- <a href="./about.html" class="nav-item nav-link"><strong>About BNRC</strong></a> -->
                    <!-- about navbar start -->
                    <div class="nav-item dropdown">
                        <a href="./about.html" class="nav-item nav-link dropdown-toggle" id="aboutDropdownToggle"
                            role="button" onclick="handleAboutClick(event)">
                            <span class="about-label">
                                <strong>About BNRC</strong>
                                <span class="arrow">▼</span>
                            </span>
                        </a>
                        <div class="dropdown-menu custom-dropdown-menu">
                            <div class="d-flex flex-row flex-wrap gap-2">
                                <!-- Main Buttons -->
                                <button class="custom-dropdown-btn active" onclick="showSection('mission', event)">
                                    Mission
                                </button>

                                <button class="custom-dropdown-btn" onclick="showSection('vision', event)">
                                    Vision
                                </button>

                                <button class="custom-dropdown-btn" onclick="showSection('formation', event)">
                                    Formation of BNRC
                                </button>

                                <button class="custom-dropdown-btn" onclick="showSection('functions', event)">
                                    Functions of BNRC
                                </button>
                            </div>

                            <!-- Leadership & Governance -->
                            <div class="position-relative mt-2">
                                <button class="custom-dropdown-btn" onclick="toggleSubmenu('lg-submenu')">
                                    Leadership & Governance
                                </button>
                                <div id="lg-submenu" class="submenu-column d-none">
                                    <button class="btn btn-link text-start w-100 my-1"
                                        onclick="showSection('leaders', event)">
                                        Our Supreme Leaders


                                        <!-- <button class="btn btn-link text-start w-100 my-1"
                                                onclick="showSection('Chairperson', event)">
                                                Chairperson Begum Khaleda Zia
                                            </button>
                                            <button class="btn btn-link text-start w-100 my-1"
                                                onclick="showSection('Acting Chairperson', event)"> Acting Chairperson
                                                Tarique Rahman
                                            </button>
 -->

                                    </button>
                                    <!-- <button class="btn btn-link text-start w-100 my-1" onclick="showSection('Chairperson', event)">
                                            Chairperson Begum Khaleda Zia
                                        </button>
                                        <button class="btn btn-link text-start w-100 my-1" onclick="showSection('Acting Chairperson', event)">
                                            Acting Chairperson Tarique Rahman
                                        </button> -->
                                    <button class="btn btn-link text-start w-100 my-1"
                                        onclick="showSection('director', event)">
                                        Board of Directors
                                    </button>

                                    <button class="btn btn-link text-start w-100 my-1"
                                        onclick="showSection('ceo', event)">
                                        The Research Team
                                    </button>

                                </div>
                            </div>

                            <!-- Board of Directors -->
                            <!-- <div class="position-relative mt-2">
                                    <button class="custom-dropdown-btn" onclick="toggleSubmenu('bd-submenu')">
                                        Board of Directors
                                    </button>
                                    <div id="bd-submenu" class="submenu-column d-none">
                                        <button class="btn btn-link text-start w-100 my-1"
                                            onclick="showSection('director', event)">
                                            Director
                                        </button>
                                        <button class="btn btn-link text-start w-100 my-1"
                                            onclick="showSection('ceo', event)">
                                            The Chief Executive Officer (CEO)
                                        </button>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                    <!-- about navbar end -->
                    <!-- .........publication start................... -->
                    <div class="nav-item dropdown">
                        <a href="./publications.html" class="nav-link dropdown-toggle"><strong>Research &
                                Publications</strong>
                            <span class="arrow">▼</span></a>
                        <div class="dropdown-menu custom-dropdown-menu">
                            <div class="d-flex flex-row flex-wrap gap-2 p-2">
                                <button class="custom-dropdown-btn" data-target="featured"
                                    onclick="featuredSection(event)">
                                    Featured
                                </button>
                                <button class="custom-dropdown-btn" data-target="newsletters"
                                    onclick="featuredSection(event)">
                                    Newsletters
                                </button>
                                <button class="custom-dropdown-btn" data-target="conferenceproceedings"
                                    onclick="featuredSection(event)">
                                    Conference Proceedings
                                </button>
                                <button class="custom-dropdown-btn" data-target="multimediaresources"
                                    onclick="featuredSection(event)">
                                    Multimedia Resources
                                </button>

                            </div>
                        </div>
                    </div>
                    <!-- ..................publication end.................. -->
                    <!-- <a href="./leadershiplegacy.html" class="nav-item nav-link"><strong>Leadership Legacy</strong></a> -->

                    <!-- <div id="nav-logo" class="mx-1 px-1 py-0 shadow shadow-1 rounded-pill">
                        <a href="#" class="navbar-brand d-flex align-items-center p-0 me-0 ">
                            <img src="./img/tt.png" alt="Logo BNRC">
                        </a>
                    </div> -->
                    <div id="nav-logo">
                        <a href="./index.html" class="navbar-brand d-flex align-items-center p-0 me-0 ">
                            <img src="./img/nav-logo.png" alt="Logo BNRC">
                        </a>
                    </div>
                    <!-- <a href="./publications.html" class="nav-item nav-link"><strong>Research &
                                Publications</strong></a> -->
                    <!-- leadershiip legacy nav bar start -->
                    <div class="nav-item dropdown">
                        <a href="./leadershiplegacy.html" class="nav-link dropdown-toggle"><strong>Leadership
                                Legacy</strong>
                            <span class="arrow">▼</span></a>
                        <div class="dropdown-menu custom-dropdown-menu">
                            <div class="d-flex flex-row flex-wrap gap-2 p-2">
                                <button class="custom-dropdown-btn" data-target="LeadershipLegacy"
                                    onclick="highlightLegacySection(event)">
                                    Leadership Legacy
                                </button>
                                <button class="custom-dropdown-btn" data-target="restoringdemocracy"
                                    onclick="highlightLegacySection(event)">
                                    Restoring Democracy
                                </button>
                                <button class="custom-dropdown-btn" data-target="economicadvancements"
                                    onclick="highlightLegacySection(event)">
                                    Economic Advancements
                                </button>
                                <button class="custom-dropdown-btn" data-target="socialdevelopment"
                                    onclick="highlightLegacySection(event)">
                                    Social Development
                                </button>
                                <button class="custom-dropdown-btn" data-target="environmental"
                                    onclick="highlightLegacySection(event)">
                                    Environmental Vision
                                </button>
                                <button class="custom-dropdown-btn" data-target="othersectors"
                                    onclick="highlightLegacySection(event)">
                                    Other Sectors
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- leadership legacy end -->
                    <a href="./share-your-thought.php" class="nav-item nav-link"><strong>Share your
                            thoughts</strong></a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Share Your Perspective, Make an
                Impact</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary"> Share your Thaught</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- 404 Start -->
    <div class="container-fluid bg-light py-2">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="w-100">
                        <h4 class="text-primary mb-4">Share Your Perspective, Make an
                            Impact</h4>
                    </div>
                    <p class="mt-1 mb-4 text-justify">
                        Community engagement fuels progress by bringing diverse perspectives together to shape impactful
                        initiatives. Your feedback— whether about the BNRC, the BNP, or national and international
                        issues—helps identify opportunities, address challenges, and inspire meaningful change. By
                        sharing your insights, you contribute to solutions that drive the collective growth of our
                        country. Together, we can refine ideas, strengthen collaboration, and build a future that
                        reflects the aspirations of generations to come. Submit your thoughts using the form below and
                        join the conversation that makes a difference.
                    </p>
                </div>

                <div class="col-lg-10 col-md-11 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="w-100">
                        <h4 class="text-primary mb-4">How We Use Your Input</h4>
                    </div>
                    <p class="mt-1 mb-4 text-justify">
                        Your contributions play a vital role in shaping policy briefs, research publications, and
                        strategic discussions, ensuring that informed perspectives drive meaningful change. Submissions
                        may be referenced in reports or policy recommendations to support evidence-based
                        decision-making. Rest assured, all shared insights are utilized solely for research and
                        development purposes, maintaining the integrity and focus of BNRC’s mission.
                    </p>
                </div>
                <div class="col-lg-10 col-md-11 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="w-100">
                        <h4 class="text-primary mb-4">Confidentiality & Privacy</h4>
                    </div>
                    <p class="mt-1 mb-4 text-justify">
                        Your privacy is important to us. Any personal details you provide will remain protected and will
                        never be disclosed without your consent. You have the option to submit your thoughts anonymously
                        or
                        choose to have your name credited for recognition. For more details on how we handle your data,
                        please review our Privacy Policy.
                    </p>
                </div>

                <div class="col-lg-10 col-md-11 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="w-100">
                        <h4 class="text-primary mb-4">Submission Guidelines</h4>
                    </div>
                    <p class="mt-1 mb-4 text-justify">
                        When sharing your thoughts, please ensure they are grounded in reliable and well-sourced
                        information to maintain factual accuracy. We encourage a professional and respectful approach to
                        discussions, fostering a constructive exchange of ideas. Additionally, submissions should be
                        policy-oriented, focusing on actionable insights that contribute to national development and
                        meaningful research.
                    </p>
                </div>
                <div class="col-lg-10 col-md-11 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="w-100">
                        <h4 class="text-primary mb-4">Terms & Conditions</h4>
                    </div>
                    <p class="mt-1 mb-4 text-justify">
                        By sharing your insights, you grant BNRC permission to reference them in research publications,
                        policy discussions, and strategic recommendations. All contributions should align with ethical
                        research practices and uphold the principles of national interest, ensuring constructive and
                        meaningful discourse.
                    </p>
                </div>

                <form method="POST" action="" enctype="multipart/form-data">
                    <h4 class="text-primary mb-4">Submit Your Thoughts:</h4>

                    <!-- Submission Status Checkboxes -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                        <h2 class="h6 text-black mb-0 me-3">Select your preferred submission status:</h2>

                        <div class="form-check d-flex align-items-center m-0">
                            <input class="form-check-input me-2" type="checkbox" name="anonymous_check"
                                id="anonymousCheck" onchange="toggleSection('anonymousSection', this)">
                            <label class="form-check-label" for="anonymousCheck">A. Remain anonymous</label>
                        </div>

                        <div class="form-check d-flex align-items-center m-0">
                            <input class="form-check-input me-2" type="checkbox" name="recognized_check"
                                id="recognizedCheck" onchange="toggleSection('recognizedSection', this)">
                            <label class="form-check-label" for="recognizedCheck">B. Be recognized</label>
                        </div>
                    </div>

                    <!-- Anonymous Section -->
                    <div id="anonymousSection" style="display: none;" class="mt-4">
                        <h5>Anonymous Feedback</h5>
                        <div class="mb-3">
                            <textarea name="anonymous_feedback" class="form-control" placeholder="Your feedback..."
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="anonymous_file">
                        </div>
                    </div>

                    <!-- Recognized Section -->
                    <div id="recognizedSection" style="display: none;" class="mt-4">
                        <h5>Recognized Feedback</h5>
                        <div class="mb-3">
                            <textarea name="recognized_feedback" class="form-control" placeholder="Your feedback..."
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="recognized_file">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Your Mobile Number"
                                required>
                        </div>
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="agree_terms" id="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">
                            I agree to the <a href="terms.html" target="_blank">terms</a> and <a href="privacy.html"
                                target="_blank">privacy policy</a>.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed btn-light bg-primary text-white rounded rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-sector-input"
                                    aria-expanded="false" aria-controls="flush-sector-input">
                                    <span class="fw-bolder">Sector-Specific Input: </span> Your ideas on how we can
                                    improve
                                </button>
                            </h2>
                            <div id="flush-sector-input" class="accordion-collapse collapse"
                                data-bs-parent="#accrShareYourThought">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the second item’s
                                    accordion body. Let’s imagine this being filled with some actual content.</div>
                            </div>
                        </div> -->
                <!-- <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed btn-light bg-primary text-white rounded rounded-top" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-share-story" aria-expanded="false"
                                    aria-controls="flush-share-story">
                                    <span class="fw-bolder">Share Stories: </span>Share how BNP initiatives have
                                    impacted you or your community
                                </button>
                            </h2>
                            <div id="flush-share-story" class="accordion-collapse collapse" data-bs-parent="#accrShareYourThought">
                                <div class="accordion-body">
                                    <div class="row">
                        
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="form-floating col-md-10 col-lg-10 col-sm-12 mb-3">
                                            <textarea id="msg-general-feed" class="form-control" style="max-height: 250px;"
                                                placeholder="What is on your mind ..."></textarea>
                                            <label for="msg-general-feed" class="form-label mx-2 my-1">What is on your
                                                mind.......</label>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                        
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="col-md-10 col-lg-10 col-sm-12 mb-3">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                        
                        
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="col-md-10 col-lg-10 col-sm-12 mb-5">
                                            <div class="row">
                                                <div class="form-floating col-md-10 col-lg-10 col-sm-12">
                                                    <input type="text" class="form-control" id="genUserName" placeholder="Name">
                                                    <label for="genUserName" class="form-label mx-2 my-1">Name</label>
                                                </div>
                                                <div class="form-floating col-md-6 col-lg-6 col-sm-12 mt-3">
                                                    <input type="email" class="form-control" id="genUserName" placeholder="Email">
                                                    <label for="genUserName" class="form-label mx-2 my-1">E-mail</label>
                                                </div>
                                                <div class="form-floating col-md-6 col-lg-6 col-sm-12 mt-3">
                                                    <input type="text" class="form-control" id="genUserName" placeholder="Mobile No.">
                                                    <label for="genUserName" class="form-label mx-2 my-1">Mobile
                                                        No.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <!-- <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed btn-light bg-primary text-white rounded rounded-top"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-faq"
                                    aria-expanded="false" aria-controls="flush-faq">
                                    <span class="fw-bolder">Ask Questions: </span> Have a question about a specific
                                    program or policy? Let us know! </button>
                            </h2>
                            <div id="flush-faq" class="accordion-collapse collapse"
                                data-bs-parent="#accrShareYourThought">
                                <div class="accordion-body">
                                    <div class="row">

                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="form-floating col-md-10 col-lg-10 col-sm-12 mb-3">
                                            <textarea id="msg-general-feed" class="form-control"
                                                style="max-height: 250px;"
                                                placeholder="What is on your mind ..."></textarea>
                                            <label for="msg-general-feed" class="form-label mx-2 my-1">What is on your
                                                mind.......</label>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>

                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="col-md-10 col-lg-10 col-sm-12 mb-3">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>


                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>
                                        <div class="col-md-10 col-lg-10 col-sm-12 mb-5">
                                            <div class="row">
                                                <div class="form-floating col-md-10 col-lg-10 col-sm-12">
                                                    <input type="text" class="form-control" id="genUserName"
                                                        placeholder="Name">
                                                    <label for="genUserName" class="form-label mx-2 my-1">Name</label>
                                                </div>
                                                <div class="form-floating col-md-6 col-lg-6 col-sm-12 mt-3">
                                                    <input type="email" class="form-control" id="genUserName"
                                                        placeholder="Email">
                                                    <label for="genUserName" class="form-label mx-2 my-1">E-mail</label>
                                                </div>
                                                <div class="form-floating col-md-6 col-lg-6 col-sm-12 mt-3">
                                                    <input type="text" class="form-control" id="genUserName"
                                                        placeholder="Mobile No.">
                                                    <label for="genUserName" class="form-label mx-2 my-1">Mobile
                                                        No.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-12"></div>

                                    </div>
                                </div>
                            </div>
                        </div> -->


            </div>



        </div>
    </div>
    </div>
    </div>
    <!-- 404 End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-1 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-2">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0">
                                        <!-- <h3 class="text-danger"><i class="fab fa-slack me-3"></i></h3> -->
                                        <img src="img/nav-logo.png" class="img-fluid" style="height: 80px;"
                                            alt="BNRL Logo">
                                    </a>
                                    <!-- <div class="d-flex flex-column">
                                        <h5 class="text-danger mb-2">Bangladesh Nationalist <br> Research Centre
                                        </h5>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h5 class="text-white mb-2">Useful Links</h5>
                                    <a href="./about.html"><i class="fas fa-angle-right me-2"></i> About BNRC</a>

                                    <a href="./publications.html"><i class="fas fa-angle-right me-2"></i> Research &
                                        Publications</a>
                                    <a href="./leadershiplegacy.html"><i class="fas fa-angle-right me-2"></i>
                                        Leadership
                                        Legacy</a>
                                    <a href="https://roadtodemocracy.com/"><i class="fas fa-angle-right me-2"></i>
                                        RTD</a>
                                    <a href="./archive/archive_home.html"><i class="fas fa-angle-right me-2"></i>
                                        Archive</a>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h5 class="text-white mb-2">External Links</h5>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="footer-instagram">
                                                <a href="https://www.bnpbd.org/" target="_blank">
                                                    <img src="./img/img-bnp.png" alt="BNP Logo" width="96px">
                                                </a>
                                                <a href="https://roadtodemocracy.com/" target="_blank">
                                                    <img src="./img/road-to-democracy.png" alt="Democracy Logo"
                                                        width="96px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-danger text-white rounded p-2 me-2">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="text-white">Address</h5>
                                                <p class="mb-0">House # 59, Flat # C-3, Road # 1, Block-l, Banani,
                                                    Dhaka-1213</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-danger text-white rounded p-2 me-2">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="text-white">Mail Us</h5>
                                                <p class="mb-0">E-mail: bnrc.org@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-danger text-white rounded p-2 me-2">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="text-white">Telephone</h5>
                                                <p class="mb-0">Hotline: +88 09613241978</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="footer-item">
                        <h5 class="text-white mb-3">Newsletter</h5>
                        <div class="position-relative rounded-pill mb-3">
                            <input class="form-control rounded-pill w-100 py-2 ps-3 pe-3" type="text"
                                placeholder="Enter your email">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-1 mt-1 me-1">SignUp</button>
                        </div>
                        <div class="d-flex flex-shrink-0">
                            <div class="footer-btn d-flex px-2">
                                <a class="btn btn-md-square rounded-circle me-3"
                                    href="https://www.facebook.com/bnrc.org"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-md-square rounded-circle me-0" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-1">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    Copyright &copy 2025;
                </div>
                <div class="col-md-2 text-center text-md-start text-body fst-italic">
                    Designed By : <a class="border-bottom text-danger" href="">BNRC</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>