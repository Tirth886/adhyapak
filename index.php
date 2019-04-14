<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <noscript><meta http-equiv="refresh" content="0; URL=/disqus/assets/js/noscript/index.html"/></noscript>
</head>

<body onload="view();">
    <div class="loadMask modern" id="view">
        <div class="loadcenter">
            <div class="loadcenter_wrap">
                <svg class="l1" width="320px" height="320px">
                    <path d="M160,0.5C212.9,53.4,319.5,160,319.5,160 L160,319.5L0.5,160L160,0.5z"/>
                </svg>
                <svg class="l2" width="320px" height="320px">
                    <path d="M160,40.5C184,64.5,279.5,160,279.5,160 L160,279.5L40.5,160L160,40.5z"/>
                </svg>
                <svg class="l3" width="320px" height="320px">
                    <path d="M160,80.5c21.7,21.7,79.5,79.5,79.5,79.5 L160,239.5L80.5,160L160,80.5z"/>
                </svg>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-items-center">
                    <img src="assets/img/logo.png" style="height:120px;">
                    <a href="register"><button class="btn btn-primary float-right" type="button" style="margin-top:41px;" ng-click="register();">
                        <i class="fa fa-user-plus rubberBand animated"></i>&nbsp; Sign up</button></a>
                        <a href="login"><button class="btn btn-primary float-right" type="button" style="margin-top:41px;margin-right:23px;color:rgb(0,0,0);background-color:rgb(255,255,255);" ng-click="login();">
                            <i class="fa fa-user-circle-o rubberBand animated"></i>&nbsp; Login
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(assets/img/group-1825510_1920.jpg);"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/TutoringServices.png);"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/maxresdefault.jpg);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="rubberBand animated infinite swiper-button-prev"></div>
            <div class="rubberBand animated infinite swiper-button-next"></div>
        </div>
    </div>
    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Services</h2>
            </div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item" data-aos="zoom-in"><a href="#"><img class="img-fluid" src="assets/img/td.jpg"></a>
                    <h3 class="name">Question's Discussion</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                   </div>
                <div class="col-sm-6 col-md-4 item"
                    data-aos="zoom-in"><a href="#"><img class="img-fluid" src="assets/img/find-the-best-home-tutors.jpg" style="padding:30px;"></a>
                    <h3 class="name" style="margin-top:36px;">Find Tutor Service</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"
                    data-aos="zoom-in"><a href="#"><img class="img-fluid" src="assets/img/shutterstock_566474392_kalinin_ilya_0.jpg" style="padding:28px;height:242px;"></a>
                    <h3 class="name" style="margin-top:38px;">Interview Experience</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                    </div>
            </div>
        </div>
    </div>
    <div class="team-boxed" style="background-color:rgb(255,255,255);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Team </h2>
            </div>
            <div class="row people">
                <div class="col-md-6 col-lg-4 item">
                    <div data-aos="zoom-in" data-aos-offset="1px" data-aos-delay="700" class="box"><img class="rounded-circle" src="assets/img/2.jpg">
                        <h3 class="name">Sanjoli&nbsp;</h3>
                        <p class="title">Musician</p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div data-aos="zoom-in" data-aos-offset="1px" data-aos-delay="700" class="box"><img class="rounded-circle" src="assets/img/2.jpg">
                        <h3 class="name">Mitali Jain</h3>
                        <p class="title">Artist</p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div data-aos="zoom-in" data-aos-offset="1px" data-aos-delay="700" class="box"><img class="rounded-circle" src="assets/img/IMG_20181107_132813.jpg">
                        <h3 class="name">Tirth Jain</h3>
                        <p class="title">Developer</p>
                        <div class="social"><a href="https://www.facebook.com/tirth.jain.399"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="https://www.instagram.com/_tirth_jain_/"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="background-color:rgb(255,255,255);margin-top:5px;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item text">
                        <h3 style="color:rgb(0,0,0);">AdHYaPak</h3>
                        <p style="color:rgb(0,0,0);"></p>
                    </div>
                    <div class="col item social"><a href="#" data-aos="flip-left" data-aos-offset="0" style="background-color:#3607f2;color:rgb(255,255,255);background-position:center;background-size:cover;"><i class="icon ion-social-facebook"></i></a><a href="#" data-aos="flip-right"
                            style="background-color:rgba(5,0,251,0.67);"><i class="icon ion-social-twitter"></i></a><a href="#" data-aos="flip-right" style="background-color:#ffe500;color:rgb(255,255,255);"><i class="icon ion-social-snapchat"></i></a><a href="#"
                            data-aos="flip-right" style="background-color:#000000;color:rgb(255,255,255);"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright" style="color:rgb(0,0,0);">AdHYaPak © 2019</p>
            </div>
        </footer>
    </div>
    <script type="text/javascript" src="assets/js/angular-route.js"></script>
    <script type="text/javascript" src="assets/js/angular-min.js"></script>
    <script src="assets/js/angular_controller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>