@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: -80px;">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1">
                <img class="img-fluid" src="/assets/img/carousel-1.jpg" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-fluid" src="/assets/img/carousel-2.jpg" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-fluid" src="/assets/img/carousel-3.jpg" alt="Image">
            </button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="/assets/img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">WhatsApp Marketing Software</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/assets/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">website, WP theme</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">E-commerce Laravel website</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/assets/img/carousel-3.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn">We Are Leader In</h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">Photography and video ads at Shebaru Studio </h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


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


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="bg-white text-center text-success px-3">Services</h6>
            <h1 class="display-6 mb-4">We Focuse On Making The Best IT solutions</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="graphics detail.php">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-1.jpg" alt="">
                    <h4 class="mb-0">Graphics Design</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="{{route('video-making')}}">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-2.jpg" alt="">
                    <h4 class="mb-0">Video Making</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="SEO detail.php">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-3.jpg" alt="">
                    <h4 class="mb-0">SEO Service</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="website detail.php">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-4.jpg" alt="">
                    <h4 class="mb-0">Website Development</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="facebook detail.php">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-5.jpg" alt="">
                    <h4 class="mb-0">Facebook Marketing</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item d-block rounded text-center h-100 p-4" href="youtube detail.php">
                    <img class="img-fluid rounded mb-4" src="/assets/img/service-6.jpg" alt="">
                    <h4 class="mb-0">Youtube Marketing</h4>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Product Start -->
<div class="container-xxl py-5 md-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="bg-white text-center text-success px-3">Products</h6>
            <h1 class="display-6 mb-4">Our Digital Products</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 " data-wow-delay="0.1s">
                <div class="card h-100">
                    <div class="rounded p-4">
                        <div class=" rounded p-4">
                            <img src="/assets/img/bulkwhatsappsoftware.png" class="img-fluid" width="280" height="150" alt="">
                        </div>
                        <div class="">
                            <div class="card-header bg-white">
                                <h5 class="">Bulk WhatsApp Marketing Software</h5>
                            </div>
                            <div class="card-body">
                                <div class="justify-content-between mb-3 ">

                                    <b class="text-success">$ 29.99</b>
                                    <del class="text-dark">
                                        <span class="mx-auto">$</span>
                                        <b class=""> 29.99</b>
                                    </del>
                                    <br>
                                    <span>Efficiently reach thousands with our powerful Bulk WhatsApp marketing software, designed for businesses to streamline communication and boost engagement.
                                    </span>
                                </div>
                            </div>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4 ">Buy Now</a>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4 ">Details</a>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 " data-wow-delay="0.1s">
                <div class="card h-100">
                    <div class=" rounded p-4">
                        <div class=" rounded p-4">
                            <img src="/assets/img/bulkwhatsappsoftware.png" class="img-fluid" width="280" height="150" alt="">
                        </div>
                        <div class="">
                            <div class="card-header bg-white">
                                <h5 class="">Canva Pro</h5>
                            </div>
                            <div class="card-body">
                                <div class="justify-content-between mb-3 ">

                                    <b class="text-success">$ 29.99</b>
                                    <del class="text-dark">
                                        <span class="mx-auto">$</span>
                                        <b class=""> 29.99</b>
                                    </del>
                                    <br>
                                    <span>Unlock the full potential of your designs with Canva Pro, featuring
                                        premium
                                        tools and resources for professional-grade creations.
                                    </span>
                                </div>
                            </div>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4 mt-5 ">Buy Now</a>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4 mt-5">Details</a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 " data-wow-delay="0.1s">
                <div class="card h-100">
                    <div class=" rounded p-4">
                        <div class=" rounded p-4">
                            <img src="/assets/img/dp/Canva-Editing-Template.jpg" class="img-fluid" width="280" height="150" alt="">
                        </div>
                        <div class="">
                            <div class="card-header bg-white">
                                <h5 class="">Canva Editable Templates</h5>
                            </div>
                            <div class="card-body">
                                <div class="justify-content-between mb-3 ">

                                    <b class="text-success">$ 29.99</b>
                                    <del class="text-dark">
                                        <span class="mx-auto">$</span>
                                        <b class=""> 29.99</b>
                                    </del>
                                    <br>
                                    <span>Simplify your design process with our versatile Canva Editable Templates, perfect for creating professional-quality graphics effortlessly.
                                    </span>
                                </div>
                            </div>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4  mt-4 ">Buy Now</a>
                            <a href="" class="btn btn-success rounded-pill py-2 px-4 mt-4 ">Details</a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="text-center ">
                <a class="rounded-pill text-center  btn btn-success" href="price.php">
                    View All
                </a>
            </div>
        </div>
    </div>
</div>
<!-- product End -->


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


<!-- Project Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class=" bg-white text-center text-success px-3">Our Projects</h6>
            <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item border rounded h-100 p-4" data-dot="01">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-1.jpg" alt="">
                    <a href="/assets/img/project-1.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Facebook Marketing</h6>
                <span>We are working with Saifurs monthly basis</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="02">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-2.jpg" alt="">
                    <a href="/assets/img/project-2.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>SEO Service</h6>
                <span>IGC Study Abroad agency is our monthly basis client</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="03">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-3.jpg" alt="">
                    <a href="/assets/img/project-2.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Video Making</h6>
                <span>Kangkhito Bangladesh is our running client</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="04">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-4.jpg" alt="">
                    <a href="/assets/img/project-4.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Facebook Marketing</h6>
                <span>Rony AC service is our royal clint from 2023</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="05">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-5.jpg" alt="">
                    <a href="/assets/img/project-5.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>YouTube Marketing</h6>
                <span>Dr. Habibur Rahman taking YT service for his NGO YT channel</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="06">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-6.jpg" alt="">
                    <a href="/assets/img/project-6.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Digital Marketing</h6>
                <span>UX Design is our valuable clint</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="07">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-7.jpg" alt="">
                    <a href="/assets/img/project-7.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Website Development</h6>
                <span>We make PhP website with SSL intigration for Apon Ghar Foundation</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="08">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-8.jpg" alt="">
                    <a href="/assets/img/project-8.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Software Making Service</h6>
                <span>BMSCL is our Software clint</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="09">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-9.jpg" alt="">
                    <a href="/assets/img/project-9.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>Voice Over</h6>
                <span>A repoted online news channel is our cling</span>
            </div>
            <div class="project-item border rounded h-100 p-4" data-dot="10">
                <div class="position-relative mb-4">
                    <img class="img-fluid rounded" src="/assets/img/project-10.jpg" alt="">
                    <a href="/assets/img/project-10.jpg" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                </div>
                <h6>UI / UX Design</h6>
                <span>Digital agency website design and development</span>
            </div>
        </div>
    </div>
</div>
<!-- Project End -->


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


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class=" bg-white text-center text-success px-3">Testimonial</h6>
            <h1 class="display-6 mb-4">What Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-success  text-light rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-1.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Ahsan Habib Talha</h5>
                        <span>Managing Director</span>
                    </div>
                </div>
                <p class="mb-0">Outstanding SEO service! Our web traffic soared by 50% in just 3 months. Highly recommend for amazing results!</p>
            </div>
            <div class="testimonial-item bg-success  text-light rounded p-4">
                <div class="d-flex align-items-center  mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-2.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Md. Ruhul Amin</h5>
                        <span>Manager, Saifurs</span>
                    </div>
                </div>
                <p class="mb-0">Facebook Marketing service boosted our online sales by 50%!. Highly recommend for shebaru it's business.</p>
            </div>
            <div class="testimonial-item bg-success text-light rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-3.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Md. Saiful Islam</h5>
                        <span>ED, Apon Ghar Foundation</span>
                    </div>
                </div>
                <p class="mb-0">Outstanding website development! Our site is sleek, fast, and user-friendly. The team was professional.</p>
            </div>
            <div class="testimonial-item bg-success text-light rounded p-4">
                <div class="d-flex align-items-center mb-4">
                    <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-4.jpg" alt="">
                    <div class="ms-4">
                        <h5 class="mb-1">Dr. Habibur Rahman</h5>
                        <span>Dean, PUB</span>
                    </div>
                </div>
                <p class="mb-0">The user-friendly tools and high-quality results have taken my projects to the next level. Highly recommend.</p>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class=" bg-white text-center text-success px-3">Blog</h6>
            <h1 class="display-6 mb-4">Latest From Our Blog</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <img class="img-fluid" src="/assets/img/blog-1.jpg" alt="">
                    <div class="blog-text">
                        <div class="breadcrumb">
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                June, 2024</a>
                        </div>
                        <a class="h4 mb-0" href="blog-detail-1.php">Top 10 Digital Marketing Trends in 2024</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="blog-item">
                    <img class="img-fluid" src="/assets/img/blog-2.jpg" alt="">
                    <div class="blog-text">
                        <div class="breadcrumb">
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                June, 2024</a>
                        </div>
                        <a class="h4 mb-0" href="blog-detail-2.php">The Ultimate Guide to Data-Driven Marketing for Maximum ROI</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="blog-item">
                    <img class="img-fluid" src="/assets/img/blog-3.jpg" alt="">
                    <div class="blog-text">
                        <div class="breadcrumb">
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                            <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                June, 2024</a>
                        </div>
                        <a class="h4 mb-0" href="blog-detail-3.php">the Secrets of Social Media:How to Boost Your Engagement in 2024</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

<script>
    //header background removed only for home page
    document.querySelector('nav.sticky-top').classList.remove('bg-success');
    window.addEventListener('scroll', function() {
        const header = document.querySelector('nav.sticky-top');
        if (window.scrollY > 100) { // Adjust the scroll value as needed
            header.classList.add('bg-success'); //add background when scrolled
        } else {
            header.classList.remove('bg-success');
        }
    });
</script>
@endsection