<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Shebaruit</title>
    <meta name="description"
        content="Explore a wide range of high-quality digital products, including software, ebooks, music, and more. Enhance your digital experience with our top-rated digital goods.">

    <!-- SEO Meta Tags -->
    <meta name="keywords"
        content="Digital Products, Software, eBooks, Digital Music, Online Services, Digital Downloads, Digital Goods, High-Quality Digital Products">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Digital Products - High-Quality Digital Goods">
    <meta property="og:description"
        content="Explore a wide range of high-quality digital products, including software, ebooks, music, and more. Enhance your digital experience with our top-rated digital goods.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.shebaruit.com">
    <meta property="og:image" content="https://www.shebaruit.com/images/og-image.jpg">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Digital Products - High-Quality Digital Goods">
    <meta name="twitter:description"
        content="Explore a wide range of high-quality digital products, including software, ebooks, music, and more. Enhance your digital experience with our top-rated digital goods.">
    <meta name="twitter:image" content="https://www.shebaruit.com/images/twitter-image.jpg">

    <!-- Author Meta Tag -->
    <meta name="author" content="Your Name or Company Name">

    <!-- Additional Meta Tags -->
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="https://www.shebaruit.com/favicon.ico">

    <!-- Favicon -->
    <link href="/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Nunito:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/venobox.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-success" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <i class="fa fa-laptop-code fa-2x text-success position-absolute top-50 start-50 translate-middle"></i>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start
    <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid  text-dark px-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="small text-dark" href="https://shebaruit.com">Home</a></li>
                        <li class="breadcrumb-item"><a class="small  text-dark" href="https://shebaru.com/internship-2">Career</a></li>
                        <li class="breadcrumb-item"><a class="small  text-dark" href="contact">Contact</a></li>
                    </ol>
                </div>
                <div class="col-lg-6 px-5 text-end">
                    <small>Follow us:</small>
                    <div class="h-100 d-inline-flex align-items-center">
                        <a class="btn-square text-dark border-end rounded-0" href="https://www.facebook.com/shebaruit"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn-square text-dark border-end rounded-0" href="https://www.youtube.com/@shebaruit?sub_confirmation=1"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn-square text-dark border-end rounded-0" href="https://www.linkedin.com/company/shebaru-it"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn-square text-dark pe-0" href="https://wa.me/1711981051"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     Topbar End -->


    <!-- Brand & Contact Start
    <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="/" class="navbar-brand m-0 p-0">
                    <img src="https://i.postimg.cc/63VWSxvG/file.png" height="80" alt="Shebaruit Logo">
                </a>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-clock text-success"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Opening Hour</p>
                                <h6 class="mb-0">Sat - thu, 10:00 - 6:00</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="fa fa-phone text-success"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Call Us</p>
                                <h6 class="mb-0">+8801711981051</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                                <i class="far fa-envelope text-success"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-2">Email Us</p>
                                <h6 class="mb-0">info@shebaruit.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   Brand & Contact End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <a href="/" class="navbar-brand m-0 p-0">
            <img src="https://i.postimg.cc/63VWSxvG/file.png" height="80" alt="Shebaruit Logo">
        </a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto p-3 p-lg-0">
                <li class="nav-item">
                    <a href="/" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/' ? "active" : "" ?>" aria-current="true">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route('about') ?>" class="nav-link <?= request()->routeIs('about') ? "active" : "" ?>">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route('service.index') ?>" class="nav-link <?= request()->routeIs('service.*') ? "active" : "" ?>">Services</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="<?= route('blog') ?>" class="nav-link <?= request()->routeIs('blog') ? "active" : "" ?>">Blog</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="<?= route('product.index') ?>" class="nav-link <?= request()->routeIs('product.*') ? "active" : "" ?>">Products</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route('project') ?>" class="nav-link <?= request()->routeIs('project') ? "active" : "" ?>">Projects</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route('contact') ?>" class="nav-link <?= request()->routeIs('contact') ? "active" : "" ?>">Contact Us</a>
                </li>
            </ul>
            <a href="https://wa.me/1711981051"
                class="btn btn-sm btn-outline-light rounded-pill border-2 py-2 px-4 d-none d-lg-block capitalize text-uppercase">Let's have a cup of tea</a>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-success  text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5 text-light ">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>2/4, B-G, Lalmatia, Dhaka</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+8801711981051</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@shebaruit.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.facebook.com/shebaruit"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.youtube.com/@shebaruit?sub_confirmation=1"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href="https://www.linkedin.com/company/shebaru-it"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://wa.me/1711981051
                        "><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h5 class=" mb-4 text-light">Quick Links</h5>
                    <a class="btn btn-link text-light" href="about">About Us</a>
                    <a class="btn btn-link text-light" href="contact">Contact Us</a>
                    <a class="btn btn-link text-light" href="service">Our Services</a>
                    <a class="btn btn-link text-light" href="">Terms & Condition</a>
                    <a class="btn btn-link text-light" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-4.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-5.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="/assets/img/project-6.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p class="">please provide your email here, you will get offer!</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-light w-100 py-3 ps-4 pe-5 text-light" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-success py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 text-light">
                        &copy; <a href="https://shebaruit.com/">Shebaru IT</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end text-light">
                        Designed By <a href="https://shebaruit.com">Shebaru IT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/wow/wow.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/lib/counterup/counterup.min.js"></script>
    <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/venobox.min.js"></script>
    <script>
        new VenoBox({
            selector: ".my-video-links"
        });
    </script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
