<?php 
    include_once("assets/controller/login.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <noscript><meta http-equiv="refresh" content="0; URL=/disqus/assets/js/noscript/index.html"/></noscript>
</head>

<body style="height:852px;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="height:140px;">
        <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/logo.png" class="pulse animated" style="height:135px;"></a><button class="navbar-toggler d-none" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group d-none"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                </form><a class="btn btn-light action-button" role="button" href="register" style="background-color:#f4476b;margin-right:19px;"><i class="fa fa-user-plus rubberBand animated"></i>&nbsp; Create new account</a><a class="btn btn-dark btn-sm" role="button"
                    href="./" style="background-color:rgb(0,0,0);"><i class="fa fa-backward"></i></a></div>
        </div>
    </nav>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" style="width:427px;">
                <h2 class="text-center"><i class="fa fa-user-circle" data-bs-hover-animate="tada" style="font-size:106px;"></i><br></h2>
                <div class="form-group">
            <center><label style="color: red;font-size: 11px;"><?php echo @$invalid_status; ?></label></center>
                    <input class="form-control" type="text" name="email" placeholder="Email" id="email" onkeyup="return email_validate1();"  value="<?php echo @$_COOKIE['uemail']; ?>">
                    <label style="color: red;float: right;font-size: 11px;" id="email_validate"><?php echo @$empty_email; ?></label>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="pass" placeholder="Password" onkeyup="pass_validate1();" value="<?php echo @$_COOKIE['upass']; ?>">
                    <label style="color: red;float: right;font-size: 11px;" id="pass_val"><?php echo @$empty_password; ?></label>
                </div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="rmem">Remember me!</label></div>
                </div>
                <div class="form-group">
                    <label class="form-check-label"><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;color: blue;">Forgot Password ? </a></label>
                </div>
                <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" data-bs-hover-animate="pulse" name="login_" value="Login" onclick = "return get_validate();">
                </div>
                <a href="register" class="already">New here ? create new account</a></form>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" ng-app="myApp1" ng-controller="fpCtrl">
      <div class="modal-header">
        <label style="color: green;" id = "mail_success" ng-bind-html = "mail_success"></label>
        <label style="color: red;" id = "mail_failure" ng-bind-html = "mail_failure"></label>
        <button type="button" class="close" data-dismiss="modal" onclick="close_me(this);">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" novalidate> 
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email" id="email1" pattern="[a-zA-Z0-9.]+@+(gmail|yahoo|rediffmail| GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)" ng-model = "email" onkeyup="email_validate2();" ng-change = "rt_phone_chk();rtmail();" ng-class = "{'error': frm.$submitted && frm.email.$error.required}" required> 
            <label style="color: red;float: right;font-size: 11px;" id="email_validate1" ng-show ="frm.email.$dirty && frm.email.$error.required && !mail_success && !mail_failure" ng-bind = "chk_valid"></label>
            <label style="color: red;float: right;font-size: 11px;" id="email_validate2" ng-show="frm.email.$dirty && frm.email.$error.pattern" ng-bind = "chk_valid_email"></label>
            <label style="color: red;float: right;font-size: 11px;" id="email_validate3" ng-bind = "chk_email_chk" ng-show = "!frm.email.$error.required && !frm.email.$error.pattern && !mail_success && !mail_failure"></label>
            <label style="color: red;float: right;font-size: 11px;" ng-show = "!chk_valid && !frm.email.$error.pattern" id="email_validate4"></label>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="phone" placeholder="Registerd contact no" id="phone" pattern="[0-9]{10}"  ng-class = "{'error': frm.$submitted && frm.phone.$error.required}" ng-model = "phone" ng-change = "rt_phone_chk();" onkeyup="phone_validation();" required> 
            <label style="color: red;float: right;font-size: 11px;" id="phone_validate1" ng-show="frm.phone.$dirty && frm.phone.$error.required && !mail_success && !mail_failure" ng-bind = "chk_phone"></label>
            <label style="color: red;float: right;font-size: 11px;" id="phone_validate2" ng-show="frm.phone.$dirty && frm.phone.$error.pattern && !mail_success && !mail_failure" ng-bind = "chk_phone_valid"></label>
            <label style="color: red;float: right;font-size: 11px;" id="phone_validate3" ng-bind = "chk_phone_chk" ng-show = "!frm.phone.$error.required && !frm.phone.$error.pattern && !mail_success && !mail_failure"></label>
            <label style="color: red;float: right;font-size: 11px;"  ng-show = "!chk_phone && !frm.phone.$error.pattern" id="phone_validate4"></label>
        </div>
        <div class="form-group" ng-if = "frm.$valid && !chk_phone_chk && !chk_email_chk">
            <button class="btn btn-primary btn-block" type="submit"  data-bs-hover-animate="pulse"  ng-click="{'frm.$valid': check()}" onclick="return modal_fg();" ><i class="fa fa-envelope" style="font-size: 25px;" id="btn1_class"></i>
            </button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <label style="opacity: 0.4; ">Password will send it to your email</label>
      </div>
    </div>

  </div>
</div>
    <div class="footer-basic" style="margin-top:22px;">
        <footer>
            <div class="social"><a href="#" data-aos="flip-right" style="background-color:#000000;color:rgb(255,255,255);"><i class="icon ion-social-instagram"></i></a><a href="#" data-aos="flip-right" style="background-color:#ffd600;color:rgb(255,255,255);"><i class="icon ion-social-snapchat"></i></a>
                <a
                    href="#" data-aos="flip-right" style="background-color:#1400ff;color:rgb(255,255,255);"><i class="icon ion-social-twitter"></i></a><a href="#" data-aos="flip-right" style="background-color:#1400ff;color:rgb(255,255,255);"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">AdHYaPak © 2019</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript" src="assets/js/angular_controller.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>