    @extends('layouts.app')

    @section('title', 'Blog')

    @section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Blog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="bg-white text-center text-primary px-3">Blog</h6>
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
                        <img class="img-fluid" src="/assets/img/blog-2.jpg" alt="">
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
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <img class="img-fluid" src="/assets/img/blog-3.jpg" alt="">
                        <div class="blog-text">
                            <div class="breadcrumb">
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                    June, 2024</a>
                            </div>
                            <a class="h4 mb-0" href="blog-detail-4.php">Innovative Trends and Tips in Modern Graphic Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <img class="img-fluid" src="/assets/img/blog-1.jpg" alt="">
                        <div class="blog-text">
                            <div class="breadcrumb">
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                    June, 2024</a>
                            </div>
                            <a class="h4 mb-0" href="blog-detail-5.php">Top Trends and Technologies in Web Development for 2024</a>
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
                            <a class="h4 mb-0" href="blog-detail-6.php">Mastering the Art of Video Making: Tips, Tricks, and Techniques for Every Creator</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <img class="img-fluid" src="/assets/img/blog-2.jpg" alt="">
                        <div class="blog-text">
                            <div class="breadcrumb">
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                    June, 2024</a>
                            </div>
                            <a class="h4 mb-0" href="blog-detail-7.php">Boost Your Business: The Benefits of Using a Bulk WhatsApp Sender</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <img class="img-fluid" src="/assets/img/blog-1.jpg" alt="">
                        <div class="blog-text">
                            <div class="breadcrumb">
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                    June, 2024</a>
                            </div>
                            <a class="h4 mb-0" href="blog-detail-8.php">Exploring the Benefits of Canva Pro for Designers and Entrepreneurs</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <img class="img-fluid" src="/assets/img/blog-2.jpg" alt="">
                        <div class="blog-text">
                            <div class="breadcrumb">
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>01
                                    June, 2024</a>
                            </div>
                            <a class="h4 mb-0" href="blog-detail-9.php">Unlocking Global Opportunities: The Comprehensive Guide to Study Abroad eBooks and Their Benefits</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center m-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    @endsection