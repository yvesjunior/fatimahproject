<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fatimah Project Mission| Portfolio</title>
    <link rel=icon href="{{ asset('assets/img/favicon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logos/logo.png') }}" alt="img"></a>
            </div>

            <div class="collapse navbar-collapse" id="Iitechie_main_menu">
                <ul class="navbar-nav menu-open text-lg-end">
                    <li class="">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About Us</a>
                    </li>

                    <li>
                        <a href="{{ route('become-volunteers') }}">Volunteer</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio') }}">Our Gallery</a>
                    </li>
                </ul>
            </div>
            <div class="nav-right-part nav-right-part-desktop">
                <div class="dropdown">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <a class="btn btn--style-two" href="{{ route('contact') }}">Support Our Mission Today</a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->


    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
        style="background-image: url({{ asset('assets/img/background/page-banner.jpg') }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Our Recent Work</h2>
                        <ul class="page-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->


    <!-- Portfolio Area start -->
    <div class="portfolio-page-area pt-120 pb-90 rel z-1">
        <div class="container">
            @php
                $categories = $portfolios->pluck('category')->filter()->unique()->values();
            @endphp
            <ul class="portfolio-filter pb-35">
                <li data-filter="*" class="current">All</li>
                @foreach($categories as $category)
                    <li data-filter=".{{ Str::slug($category) }}">{{ $category }}</li>
                @endforeach
            </ul>

            <div class="row portfolio-active justify-content-center gallery-img">
                @forelse($portfolios as $item)
                    @php
                        $imgSrc = Str::startsWith($item->image, 'portfolio/') && !Storage::disk('public')->exists($item->image)
                            ? asset('assets/img/' . $item->image)
                            : asset('storage/' . $item->image);
                    @endphp
                    <div class="col-xl-4 col-md-6 item {{ Str::slug($item->category ?? '') }}">
                        <div class="portfolio-item" style="height: 320px;">
                            <a href="{{ $imgSrc }}" class="portfolio-lightbox" title="{{ $item->title ?: '' }}">
                                <img src="{{ $imgSrc }}" alt="{{ $item->title ?: 'Gallery' }}">
                                <div class="portfolio-item__over">
                                    <span class="details-btn"><i class="fa fa-search-plus"></i></span>
                                    @if($item->title)
                                        <h5>{{ $item->title }}</h5>
                                    @endif
                                    @if($item->category)
                                        <span class="category">{{ $item->category }}</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Fallback: load images from folder like the original --}}
                    <script>
                        $( document ).ready(function() {
                            for (var i = 1; i < 100; i++) {
                                var src = '{{ asset('assets/img/portfolio') }}/' + i + '.jpg';
                                $( ".gallery-img" ).append(
                                    "<div class='col-xl-4 col-md-6 item'>" +
                                        "<div class='portfolio-item' style='height: 320px;'>" +
                                            "<a href='" + src + "' class='portfolio-lightbox'>" +
                                                "<img src='" + src + "' alt='Gallery'>" +
                                                "<div class='portfolio-item__over'><span class='details-btn'><i class='fa fa-search-plus'></i></span></div>" +
                                            "</a>" +
                                        "</div>" +
                                    "</div>"
                                );
                            }
                            $('.portfolio-lightbox').magnificPopup({ type: 'image', gallery: { enabled: true } });
                        });
                    </script>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Portfolio Area end -->

    <!-- footer area start -->
    <footer class="footer-area overlay text-white pt-120 bgs-cover"
        style="background-image: url('{{ asset('assets/img/footer/footer-bg.jpg') }}');">
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/skill.bars.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/imageload.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!-- main js  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.portfolio-lightbox').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [1, 1]
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    easing: 'ease-in-out'
                },
                image: {
                    titleSrc: 'title'
                }
            });
        });
    </script>
</body>

</html>
