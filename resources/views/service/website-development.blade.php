@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Website Development</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Website Development</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">

            {{--  Cosmetics Videos   --}}
            <div class="col-lg-12">
                <div class="card border-0">
                    <div class="card-body row  justify-content-around">
                        <div class="video bg-light border pb-2 col-lg-3 text-center" style="position: relative;">
                            <img class="py-3" src="{{ asset('assets/img/website-service/ecom.jpg') }}" width="280"
                                 height="200" alt="">
                            <strong class="">
                                ই-কমার্স সাইট <br>
                                মাত্র <span class="text-danger rounded bg-warning px-2">৳১০,০০০ টাকা</span>
                            </strong>
                        </div>
                        <div class="video bg-light border pb-2  col-lg-3 text-center" style="position: relative; cursor: pointer;">
                            <img class="py-3" src="{{ asset('assets/img/website-service/delivery.png') }}" width="280"
                                 height="200" alt="">
                            <strong>
                                কুরিয়ার সার্ভিস ওয়েবসাইট  <br>
                                মাত্র <span class="text-danger rounded bg-warning px-2">৳২৫,০০০ টাকা </span>
                            </strong>
                        </div>
                        <div class="video bg-light border pb-2  col-lg-3 text-center" style="position: relative; cursor: pointer;">
                            <img class="py-3" src="{{ asset('assets/img/website-service/appointment.png') }}" width="280"
                                 height="200" alt="">
                            <strong>
                                এপয়েন্টমেন্ট বুকিং ওয়েবসাইট <br>
                                মাত্র <span class="text-danger rounded bg-warning px-2">৳30,০০০ টাকা </span>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            {{--  End Cosmetics Videos   --}}
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
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
