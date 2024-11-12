    @extends('layouts.app')

    @section('title', 'Project')

    @section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="bg-white text-center text-success px-3">Our Projects</h6>
                <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center ">
                    <ul class="list-inline mb-5" id="project-flters">
                        <li class="btn" data-filter="*">
                            <i class="fa fa-star me-2"></i>All
                        </li>
                        <li class="btn" data-filter=".first">
                            <i class="fa fa-laptop-code me-2"></i>Design
                        </li>
                        <li class="btn" data-filter=".second">
                            <i class="fa fa-mobile-alt me-2"></i>Development
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 project-container">
                <div class="col-xl-3 col-lg-3 col-md-6 project-col first">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-1.jpg" alt="">
                                <a href="img/project-1.jpg"></i></a>
                            </div>
                            <h6>Facebook Marketing</h6>
                            <span>We are working with Saifurs monthly basis</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col second">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-2.jpg" alt="">
                                <a href="img/project-2.jpg"></a>
                            </div>
                            <h6>SEO Service</h6>
                            <span>IGC Study Abroad agency is our monthly basis client</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col first">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-3.jpg" alt="">
                                <a href="img/project-2.jpg"></a>
                            </div>
                            <h6>Video Making</h6>
                            <span>Kangkhito Bangladesh is our running client</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col second">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-4.jpg" alt="">
                                <a href="img/project-4.jpg"></a>
                            </div>
                            <h6>Facebook Marketing</h6>
                            <span>Rony AC service is our royal clint from 2023</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col first">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-5.jpg" alt="">
                                <a href="img/project-5.jpg"></a>
                            </div>
                            <h6>YouTube Marketing</h6>
                            <span>Dr. Habibur Rahman taking YT service for his NGO YT channel</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col first">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-9.jpg" alt="">
                                <a href="img/project-9.jpg"></a>
                            </div>
                            <h6>Voice Over</h6>
                            <span>A repoted online news channel is our cling</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col second">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-10.jpg" alt="">
                                <a href="img/project-10.jpg"></a>
                            </div>
                            <h6>UI / UX Design</h6>
                            <span>Digital agency website design and development</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col first">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-8.jpg" alt="">
                                <a href="img/project-8.jpg"></a>
                            </div>
                            <h6>Software Making Service</h6>
                            <span>BMSCL is our Software clint</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 project-col second">
                    <a href="project-detail.php">
                        <div class=" border rounded h-100 p-4">
                            <div class="position-relative mb-4">
                                <img class="img-fluid rounded" src="/assets/img/project-6.jpg" alt="">
                                <a href="img/project-6.jpg"></a>
                            </div>
                            <h6>Digital Marketing</h6>
                            <span>UX Design is our valuable clint</span>
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="bg-white text-center text-success px-3">Testimonial</h6>
                <h1 class="display-6 mb-4">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-1.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    @endsection