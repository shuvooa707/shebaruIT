    @extends('layouts.app')

    @section('title', 'Graphics Design')

    @section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Graphics Design</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Graphics Design</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Detail Start -->
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
                    <h1 class="display-6 mb-4">Graphics Design</h1>
                    <p class="mb-5">Transform your vision into compelling visuals with our expert graphic design services. From logo creation to full brand identity development, we blend creativity with strategic insight to deliver impactful designs. Our process involves thorough research, collaborative concept development, meticulous iteration based on feedback, and flawless execution. Whether you need print materials, digital assets, or multimedia designs, our team ensures every project meets high standards of quality and innovation. Elevate your brand with designs that captivate, communicate, and resonate with your audience.</p>

                    <h3 class="mb-4">Our Working Process</h3>

                
              <ul class="list-note">
                        <li>
                            <span>01</span>
                            <div>
                                <h5>Discovery and Research</h5>
                                <p>We begin by understanding your goals and target audience through detailed discussions and research.
                                    </p>
                            </div>
                        </li>
                        <li>
                            <span>02</span>
                            <div>
                                <h5>Creative Concept Development</h5>
                                <p>Our team brainstorm and develop initial design concepts tailored to your brand identity and objectives.</p>
                            </div>
                        </li>
                        <li>
                            <span>03</span>
                            <div>
                                <h5>Iterative Refinement</h5>
                                <p>We collaborate closely with you, refining designs based on your feedback to ensure they align perfectly with your vision.</p>
                            </div>
                        </li>
                        <li>
                            <span>04</span>
                            <div>
                                <h5>Finalization and Delivery</h5>
                                <p>Once approved, we meticulously prepare and deliver high-quality designs ready for implementation across various platforms.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Detail End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Services Start -->
                    <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="mb-4">Other Services</h3>
                        <div class="service-list d-flex flex-column">
                            <a class="bg-white text-body" href="<?= route('service.graphics') ?>">Graphics Design</a>
                            <a class="bg-white text-body" href="<?= route('service.video') ?>">Video Making</a>
                            <a class="bg-white text-body" href="<?= route('service.seo') ?>">SEO Optimization</a>
                            <a class="bg-white text-body" href="<?= route('service.website') ?>">Website Development</a>
                            <a class="bg-white text-body" href="<?= route('service.facebook') ?>">Facebook Marketing</a>
                            <a class="bg-white text-body" href="<?= route('service.youtube') ?>">Youtube Marketing</a>
                        </div>
                    </div>
                    <!-- Services End -->

                    <!-- Call To Action Start -->
                    <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="mb-4">Need Any Help?</h3>
                        <div class="bg-white rounded p-4 mb-2">
                            <p class="mb-2"><i class="fa fa-phone text-primary me-3"></i>Call Us Now</p>
                            <h5 class="mb-0">+8801711981051</h5>
                        </div>
                        <div class="bg-white rounded p-4">
                            <p class="mb-2"><i class="fa fa-envelope-open text-primary me-3"></i>Mail Us Now</p>
                            <h5 class="mb-0">info@shebaruit.com</h5>
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
    <!-- Service Detail End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class=" bg-white text-center text-primary px-3">Testimonial</h6>
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
