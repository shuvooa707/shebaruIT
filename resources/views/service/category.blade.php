<!-- Videos Start -->
<style>
    .video_item {
        position: relative;
    }
    .video_overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        text-align: center;
    }
    .video_overlay a {
        margin-top: 30%;
    }
</style>
<section>
    <div class="container">
        <h1>Video List</h1>
        <div class="row">
            <div class="col-lg-2">
                <div class="video_item">
                    <img class="w-100" src="/assets/img/project-1.jpg" alt="project-1">
                    <div class="video_overlay">
                        <a href="<?= route('boipotro') ?>" class="btn btn-success pe-4">বইপত্র</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="video_item">
                    <img class="w-100" src="/assets/img/project-2.jpg" alt="project-1">
                    <div class="video_overlay">
                        <a href="<?= route('kobikonthe') ?>" class="btn btn-success pe-4">কবিকণ্ঠে কবিতা</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="video_item">
                    <img class="w-100" src="/assets/img/project-3.jpg" alt="project-1">
                    <div class="video_overlay">
                        <a href="<?= route('abritti') ?>" class="btn btn-success pe-4">আবৃত্তি</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="video_item">
                    <img class="w-100" src="/assets/img/project-4.jpg" alt="project-1">
                    <div class="video_overlay">
                        <a href="<?= route('sakkhatkar') ?>" class="btn btn-success pe-4">সাক্ষাৎকার</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="video_item">
                    <img class="w-100" src="/assets/img/project-5.jpg" alt="project-1">
                    <div class="video_overlay">
                        <a href="<?= route('shebarutv') ?>" class="btn btn-success pe-4">সেবারু টিভি</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mt-5">
                <style>
                    .my_anchor {
                        cursor: pointer;
                    }
                    .my_btn {
                        color: white;
                        display: flex;
                        border-radius: 15px;
                    }
                    .my_btn h4 {
                        color: white;
                        padding-top: 10px;
                    }
                    .my_btn i {
                        width: 40px;
                        height: 40px;
                        text-align: center;
                        line-height: 40px;
                        display: inline-block;
                        border: 2px solid white;
                        border-radius: 50%;
                        margin-top: 3px;
                    }
                </style>
                <a class="my_anchor" href="https://Wa.me/+8801897984420">
                    <div class="my_btn bg-success">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Message On WhatsApp</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Videos End -->
