<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fatimah Project Mission| About Us</title>
    <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/magnific.min.css">
    <link rel="stylesheet" href="assets/css/spacing.min.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class='sc5'>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->


    <div class="body-overlay" id="body-overlay"></div>

    <!-- navbar start -->
    <div class="navbar-top pt-15 pb-10 bgc-black navtop--one">
        <div class="container">
            <div class="navtop-inner">
                <ul class="topbar-left">

                </ul>
                <ul class="topbar-right">
                    <li class="social-area">
                        <span>Follow Us - </span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar py-30 navbar--one navbar-area navbar-expand-lg">
        <div class="container nav-container navbar-bg">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="/"><img src="assets/img/logos/logo.png" alt="img"></a>
            </div>

            <div class="collapse navbar-collapse" id="Iitechie_main_menu">
                <ul class="navbar-nav menu-open text-lg-end">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/become-volunteers">Volunteer</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/portfolio">Our Gallery</a></li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop">
                <div class="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <a class="btn btn--style-two" href="/contact">Support Our Mission Today</a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->


    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
        style="background-image: url(assets/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">About Us</h2>
                        <ul class="page-list">
                            <li><a href="/">Home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->


    <!-- Client Logo area start -->
    <div class="client-logo-area py-75"
        style="background-image: url(assets/img/client-logo/client-logo-section-bg.jpg);">
        <div class="container">
            <div class="client-logo-wrap">
                <div class="client-logo-item">
                    <a href="#"><img src="assets/img/client-logo/client-logo1.png" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item">
                    <a href="#"><img src="assets/img/client-logo/client-logo2.png" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item">
                    <a href="#"><img src="assets/img/client-logo/client-logo3.png" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item">
                    <a href="#"><img src="assets/img/client-logo/client-logo4.png" alt="Client Logo"></a>
                </div>
                <div class="client-logo-item">
                    <a href="#"><img src="assets/img/client-logo/client-logo5.png" alt="Client Logo"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Logo area end -->


    <!-- Why Choose Us area start -->
    <div class="why-choose-area overlay py-120">
        <div class="container">
            <div class="row gap-100 align-items-center">
                <div class="col-lg-6">
                    <div class="why-choose-content text-white rmb-65">
                        <div class="section-title mb-60">
                            <span class="section-title__subtitle mb-10">{{ $about->why_subtitle }}</span>
                            <h2>{{ $about->why_heading }}</h2>
                        </div>
                        <div class="vission-mission-tab">
                            <ul class="nav mb-25" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#mission">Our Mission</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#vission">Our Vision</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="mission">{{ $about->mission_text }}</div>
                                <div class="tab-pane fade" id="vission">{{ $about->vision_text }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-video">
                        <div class="video rel">
                            <img src="assets/img/video/video-bg.jpg" alt="Video">
                            @if($about->video_url)
                            <a class="video-play video-play--one" href="{{ $about->video_url }}"
                                data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                            @endif
                        </div>
                        <img class="leaf-shape top_image_bounce" src="assets/img/shapes/three-round-green.png"
                            alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us area end -->


    <!-- FAQ / Programs area start -->
    <div class="faq-area py-120">
        <div class="container">
            <div class="row gap-100">
                <div class="col-lg-6">
                    <div class="faq-image-part">
                        <div class="row">
                            <div class="col-6">
                                <div class="image">
                                    <img src="assets/img/about/about5.jpg" alt="About" style="height:230px; border-radius: 15px;">
                                    <img class="shape one top_image_bounce"
                                        src="assets/img/shapes/three-round-green.png" alt="Shape">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="image">
                                    <img src="assets/img/about/about4.jpg" alt="About" style="border-radius: 15px;">
                                </div>
                                <div class="image">
                                    <img src="assets/img/about/about3.jpg" alt="About" style="border-radius: 15px;">
                                    <img class="shape two right_image_bounce"
                                        src="assets/img/shapes/three-round-red.png" alt="Shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-content-part rmt-65">
                        <div class="section-title mb-45 for-hide-summary">
                            <span class="section-title__subtitle mb-10">Our Programs</span>
                        </div>
                        @if($about->programs && count($about->programs) > 0)
                        <div class="faq-accordion" id="faqAccordion">
                            @foreach($about->programs as $index => $program)
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading{{ $index }}">
                                    <button type="button" @class(['collapsed' => $index > 0]) data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        {{ $program['title'] }}
                                    </button>
                                </h5>
                                <div id="collapse{{ $index }}" @class(['accordion-collapse collapse', 'show' => $index === 0])
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $program['body'] }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ / Programs area end -->


    <!-- About / Get Involved area start -->
    <div class="urgent-cause-area overlay bgs-cover pt-120 pb-90 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image-part">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="image">
                                    <img src="assets/img/about/about1.jpg" alt="About">
                                </div>
                                <div class="project-complete mb-30">
                                    <div class="project-complete__icon">
                                        <i class="flaticon-charity"></i>
                                    </div>
                                    <div class="project-complete__content">
                                        <h5>We Complete 100+ Project</h5>
                                        <span>Donate for charity</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="image mt-65 rmt-15 rel">
                                    <img src="assets/img/about/about2.jpg" alt="About">
                                    <div class="experiences-years">
                                        <span class="experiences-years__number">5</span>
                                        <span class="experiences-years__text">Years Experiences</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-part rmt-65">
                        <div class="section-title mb-60">
                            <span class="section-title__subtitle mb-10">{{ $about->involved_subtitle }}</span>
                            <h2>{{ $about->involved_heading }}</h2>
                        </div>
                        <p>{{ $about->involved_description }}</p>
                        <div class="counter-item counter-text-wrap mt-30">
                            <div class="counter-item__icon"><i class="flaticon-solidarity"></i></div>
                            <div class="counter-item__content">
                                <span class="count-text" data-speed="3000" data-stop="{{ $about->raised_amount }}">0</span>
                                <span class="counter-title">{{ $about->raised_label }}</span>
                            </div>
                        </div>
                        <div class="counter-item counter-text-wrap">
                            <div class="counter-item__icon counter-item__icon--green"><i class="flaticon-help"></i></div>
                            <div class="counter-item__content">
                                <span class="count-text" data-speed="3000" data-stop="{{ $about->volunteer_count }}">0</span>
                                <span class="counter-title">{{ $about->volunteer_label }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About / Get Involved area end -->


    <!-- footer area start -->
    <footer class="footer-area overlay text-white pt-120 bgs-cover"
        style="background-image: url('assets/img/footer/footer-bg.jpg');">
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/circle-progress.min.js"></script>
    <script src="assets/js/skill.bars.jquery.min.js"></script>
    <script src="assets/js/magnific.min.js"></script>
    <script src="assets/js/appear.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/imageload.min.js"></script>
    <script src="assets/js/slick.min.js"></script>

    <!-- main js  -->
    <script src="assets/js/main.js"></script>
</body>

</html>
