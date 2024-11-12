    @extends('layouts.app')

    @section('title', 'WhatsApp Marketing')

    @section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Project Detail</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Project Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Detail Start -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div id="detail-carousel" class="carousel slide mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="/assets/img/carousel-1.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="/assets/img/carousel-2.jpg" alt="Image">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#detail-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#detail-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h1 class="display-6 mb-4">Web Design and Development</h1>
                    <p class="mb-4">Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                        magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                        amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                        sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                        aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                        sit stet no diam kasd vero.</p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="/assets/img/project-1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="/assets/img/project-2.jpg" alt="">
                        </div>
                    </div>
                    <h3 class="mb-4">Client's Review</h3>
                    <div class="bg-light rounded p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid rounded-circle" width="80" height="80" src="/assets/img/testimonial-1.jpg" alt="">
                            <div class="ms-4">
                                <h4>Jhon Doe</h4>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                        <h4>Creative and effective work</h4>
                        <p class="mb-0">onumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                            amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                            sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                            aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                            sit stet no diam kasd vero.</p>
                    </div>
                </div>
                <!-- Detail End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Project Info Start -->
                    <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="mb-4">Project Info</h3>
                        <ul class="project-info list-unstyled mb-0">
                            <li>
                                <span>Project Name:</span>
                                <span>Web Design</span>
                            </li>
                            <li>
                                <span>Client Name:</span>
                                <span>John Doe</span>
                            </li>
                            <li>
                                <span>Project Manager:</span>
                                <span>John Doe</span>
                            </li>
                            <li>
                                <span>Project URL:</span>
                                <span>www.example.com</span>
                            </li>
                            <li>
                                <span>Complete Date:</span>
                                <span>01 Jan, 2045</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Project Info End -->

                    <!-- Call To Action Start -->
                    <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="mb-4">Need Any Help?</h3>
                        <div class="bg-white rounded p-4 mb-2">
                            <p class="mb-2"><i class="fa fa-phone text-primary me-3"></i>Call Us Now</p>
                            <h5 class="mb-0">+012 345 6789</h5>
                        </div>
                        <div class="bg-white rounded p-4">
                            <p class="mb-2"><i class="fa fa-envelope-open text-primary me-3"></i>Mail Us Now</p>
                            <h5 class="mb-0">info@example.com</h5>
                        </div>
                    </div>
                    <!-- Call To Action End -->

                    <!-- Appontment Start -->
                    <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="mb-4">Appontment</h3>
                        <p class="mb-4">Are you interested with this service? Make an appointment.</p>
                        <a class="btn btn-white w-100 py-3" href="#">Make An Appointment</a>
                    </div>
                    <!-- Appontment End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Project Detail End -->
    @endsection