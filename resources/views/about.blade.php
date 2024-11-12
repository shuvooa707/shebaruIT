    @extends('layouts.app')

    @section('title', 'Home')

    @section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-success mb-4"></i>
                        <h5 class="mb-3">Years Experience</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">5</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users-cog fa-4x text-success mb-4"></i>
                        <h5 class="mb-3">Team Members</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">11</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-success mb-4"></i>
                        <h5 class="mb-3">Satisfied Clients</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">29</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-check fa-4x text-success mb-4"></i>
                        <h5 class="mb-3">Projects Done</h5>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">30</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="/assets/img/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class=" bg-white text-start text-success pe-3">About Us</h6>
                        <h1 class="display-6 mb-4">#1 Digital Marketing Agency <span class="text-success">5
                                Years</span> Of Experience</h1>
                        <p>Shebaru IT is a leading digital marketing company based in Dhaka, Bangladesh, dedicated to providing innovative and reliable IT solutions.</p>
                        <p class="mb-4">We specialize in empowering businesses groth with digital products and services to succeed in an increasingly digital world. Shebaru IT offers an extensive collection of digital products and services at the lowest prices.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="/assets/img/team-1.jpg" alt=""
                                style="width: 50px; height: 50px;">
                            <div class="ps-4">
                                <h6>Abu Jafar Raju</h6>
                                <small>CEO & Founder</small>
                            </div>
                        </div>
                        <a class="btn btn-success rounded-pill py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class=" bg-white text-start text-success pe-3">Why Choose Us</h6>
                        <h1 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h1>
                        <p class="mb-4">Embracing the latest technologies to provide cutting-edge solutions. A team of skilled professionals committed to excellence and innovation.
                            Reliable Support: Dedicated to providing ongoing support and ensuring client satisfaction. </p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Digital Marketing</p>
                                        <p class="mb-2">85%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">SEO & Backlinks</p>
                                        <p class="mb-2">90%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Design & Development</p>
                                        <p class="mb-2">95%</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="95"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="/assets/img/feature.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class=" bg-white text-center text-success px-3">Our Team</h6>
                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/assets/img/team-1.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Md. Salah Uddin</h5>
                                <span>Chief Software Engineer</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.facebook.com/shebaruit"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="http://www.youtube.com/@shebaruit?sub_confirmation=1"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.linkedin.com/company/shebaru-it"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/assets/img/team-2.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Afsana Shantona</h5>
                                <span>Voice over Artist</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.facebook.com/shebaruit"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="http://www.youtube.com/@shebaruit?sub_confirmation=1"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.linkedin.com/company/shebaru-it"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/assets/img/team-3.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Hasanul Bannah</h5>
                                <span>Chief Graphics Designer</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.facebook.com/shebaruit"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="http://www.youtube.com/@shebaruit?sub_confirmation=1"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-square btn-success rounded-circle" href="https://www.linkedin.com/company/shebaru-it"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    @endsection