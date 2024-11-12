@extends('layouts.app')

@section('title', 'Graphics Design')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Video Marketing</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white font-xl" href="{{ route('video-making') }}">Services</a>
                    </li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Video Marketing</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 justify-content-center">
                {{--  Clothing Videos   --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-1 rounded-0 bg-primary text-white">
                            <marquee behavior="" direction="">
                                পোশাক বিজ্ঞাপন ভিডিও
                            </marquee>
                        </div>
                        <div class="card-body row justify-content-around">
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/eHXespjZ3Mg?si=AjCikXZ4dVOegVxx')">
                                <img src="{{ asset('assets/img/video-service/service1.jpg') }}" width="280" height="200"
                                     alt="">
                                <img style="position: absolute; bottom: 30px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Hoodie Review Video</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/IUc8HV7fa1o?si=U6DtgxXx9tZt3l_r')">
                                <img src="{{ asset('assets/img/video-service/service2.webp') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 30px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>T-Shirt Review</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/Lq-qd9FDzqQ?si=ic8mAPWk-3gal5Jl')">
                                <img src="{{ asset('assets/img/video-service/service3.jpg') }}" width="280" height="200"
                                     alt="">
                                <img style="position: absolute; bottom: 30px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Baby Dress Review</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/piXt8N3KzOk?si=4ANYmiYPzEb4HP9u')">
                                <img src="{{ asset('assets/img/video-service/service4.jpg') }}" width="280" height="200"
                                     alt="">
                                <img style="position: absolute; bottom: 30px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Katua, Gents Dress Review</strong>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  End Clothing Videos   --}}

                {{--  Cosmetics Videos   --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-1 rounded-0 text-white" style="background: #f24e15">
                            <marquee behavior="" direction="">
                            কসমেটিক বিজ্ঞাপন ভিডিও
                            </marquee>
                        </div>
                        <div class="card-body row justify-content-around">
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/CxLIf9mXT1w?si=O0jerA66qy7UAX7F')">
                                <img src="{{ asset('assets/img/video-service/cosmetic1.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Fiona Collagen Review Video</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/FmL7WqcTWng?si=c_TqtpqUxVxzuiOp')">
                                <img src="{{ asset('assets/img/video-service/cosmetic2.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Organic Hair Oil Combo Review</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/4yv-edUZmnQ?si=TVvqoj8lJp-iCFaN')">
                                <img src="{{ asset('assets/img/video-service/cosmetic3.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Beauty Product, 6 in 1 rainbow combo pack</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/Oh7yh2SDoF8?si=6EOH0lkWpfVNqdzM')">
                                <img src="{{ asset('assets/img/video-service/cosmetic4.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Beauty Product Review</strong>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  End Cosmetics Videos   --}}


                {{--  স্বাস্থ্যসেবা Videos   --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-1 rounded-0 bg-success text-white">
                            স্বাস্থ্যসেবা বিজ্ঞাপন ভিডিও
                        </div>
                        <div class="card-body row justify-content-around">
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/zxFZfYKZrvg?si=YzndLs4Tn6H-WpJE')">
                                <img src="{{ asset('assets/img/video-service/healthcare1.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Miracle Serum And Night cream Combo</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/Ex_6-NWsGLo?si=0ke6mPpAQI8qs8xQ')">
                                <img src="{{ asset('assets/img/video-service/healthcare2.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Rishi Spore Medicine</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/B8_zQqvzdYk?si=7IyLsT-P_Bd07Cgv')">
                                <img src="{{ asset('assets/img/video-service/healthcare3.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Nursing app</strong>
                            </div>
                            <div class="video col-lg-3" style="position: relative; cursor: pointer;"
                                 onclick="openPlayModal('https://www.youtube.com/embed/CQsVUpbGouQ?si=9okmQjDJzZdrEfNn')">
                                <img src="{{ asset('assets/img/video-service/healthcare4.jpg') }}" width="280"
                                     height="200" alt="">
                                <img style="position: absolute; bottom: 55px; left: 20px;"
                                     src="{{ asset('assets/img/YouTube_play_button_icon.png') }}" width="40" alt="">
                                <strong>Healthcare product</strong>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  End স্বাস্থ্যসেবা Videos   --}}

                <div class="col-lg-12 text-center text-primary">
                    <a href="https://www.youtube.com/@ShebaruStudio/videos">
                        <h2 class="text-primary underline">আমাদের সব ভিডিও দেখুন</h2>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Service Detail End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 text-white">
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
                            <h5 class="mb-1">Sumaiya Hassan</h5>
                            <span>CEO, CairoMark</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        তাদের তৈরি ভিডিও কনটেন্ট দেখে আমরা অভিভূত! আমাদের ব্র্যান্ডের গুরুত্ব এবং পণ্যের বৈশিষ্ট্য এত
                        সুন্দরভাবে তুলে ধরেছে যা আমাদের প্রত্যাশার বাইরে ছিল। Highly recommended!
                    </p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Arif</h5>
                        </div>
                    </div>
                    <p class="mb-0">
                        এই টিম সত্যিই স্টোরিটেলিং এবং ভিজ্যুয়াল অ্যাপিল বোঝে। আমাদের ধারণা নিয়ে একটি আকর্ষণীয়, উচ্চ-মানের ভিডিও বানিয়েছে যা আমাদের দর্শকদের মধ্যে যথেষ্ট প্রভাব ফেলেছে। পেশাদার, সময়মতো এবং সৃজনশীল
                    </p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Md. Abdul</h5>
                        </div>
                    </div>
                    <p class="mb-0">
                        আমরা বেশ কয়েকটি ভিডিও এজেন্সির সাথে কাজ করেছি, কিন্তু এই এজেন্সি তাদের সৃজনশীলতা এবং ডিটেইলসের প্রতি মনোযোগের জন্য সেরা। এই ভিডিওটি আমাদের নতুন গ্রাহকদের কাছে পৌঁছাতে সহায়ক হয়েছে।
                    </p>
                </div>
                <div class="testimonial-item bg-success  text-ligh rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="/assets/img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Azad</h5>
                        </div>
                    </div>
                    <p class="mb-0">
                        তাদের ভিডিও প্রোডাকশন প্রক্রিয়া ছিল মসৃণ এবং সহযোগিতামূলক। তারা সত্যিই আমাদের ব্র্যান্ডটি ভালোভাবে বুঝেছে, যার ফলে আমাদের লক্ষ্য দর্শকদের কাছে একটি সত্যিকার ও প্রাসঙ্গিক ভিডিও পৌঁছানো সম্ভব হয়েছে। অসাধারণ কাজ!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Video View Modal -->
    <div class="modal" id="video-view-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-end flex justify-content-end">
                    <button onclick="closeModal()" style="border: none; background: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <h2 aria-hidden="true">&times;</h2>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <iframe id="video-iframe" width="660" height="385" src="" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video View Modal -->



    <script type="text/javascript">
        const closeModal = _ => {
            $('#video-view-modal').modal('toggle');
        }
        const openPlayModal = vLink => {
            console.log(vLink)
            document.querySelector("#video-iframe").src = vLink;
            $('#video-view-modal').modal('toggle');
        }
    </script>
@endsection
