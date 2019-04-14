<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
  <noscript><meta http-equiv="refresh" content="0; URL=/disqus/assets/js/noscript/index.html"/></noscript>
</head>

<body ng-app="myApp" ng-controller="regCtrl">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="margin-top:0px;margin-bottom:-119px;height:150px;">
        <div class="container"><a class="navbar-brand" href="#" style="margin-left:-18px;padding:12px;margin-top:-18px;"><img src="assets/img/logo.png" class="pulse animated" style="height:138px;margin-right:0px;margin-top:2px;"></a><button class="navbar-toggler d-none" data-toggle="collapse"
                data-target="#navcol-1"><span class="sr-only">Toggle navigation</span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search d-none"></i></label><input class="form-control d-none visible search-field" type="search" name="search" id="search-field"></div>
                </form><a class="btn btn-light action-button" role="button" href="login" data-bs-hover-animate="pulse" style="margin-right:18px;"><i class="fa fa-user rubberBand animated"></i>&nbsp; &nbsp;Login!</a>
                <a href="./"><button class="btn btn-primary btn-sm" type="button" style="background-color:rgb(0,0,0);">
                    <i class="fa fa-backward"></i>
                </button></a>
            </div>
        </div>
    </nav>
<br>
<br>
<br><br>
<br>
<br>
    <div class="register-photo" style="background-color:rgb(255,255,255);height:644px;margin-top:5px;">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(assets/img/td.jpg);"></div>
            <form method="post" name="frm" style="width:454px;" ng-model = "frm" novalidate>
                <!-- <h2 class="text-center" data-bs-hover-animate="tada"><i class="fa fa-users" data-bs-hover-animate="tada" style="font-size:106px;"></i></h2> -->

                <center><label style="color: green;font-size: 11px;" ng-bind = "suc"> </label></center>
                <label 
                style="color: red;float: right;font-size: 11px;" 
                ng-bind-html = "fail">
                </label>
                <div class="form-group">
                    <input 
                    class="form-control" 
                    type="text" 
                    name="name" 
                    placeholder="Name" 
                    autocomplete="off" 
                    ng-model="getname" 
                    id="name"
                    pattern="[a-zA-Z ]{3,15}"
                    ng
                    onkeyup="name_validate();" 
                    required>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="name_validate" 
                    ng-show="frm.name.$dirty && frm.name.$error.required" 
                    ng-bind = "chk_name">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;"  
                    ng-bind = "chk_name1">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="name_validate" 
                    ng-show="frm.name.$dirty && frm.name.$error.pattern" 
                    ng-bind = "chk_name_valid">
                    </label>
                </div>
                <div class="form-group">    
                    <input 
                    class="form-control" 
                    type="name" 
                    name="email" 
                    placeholder="Email" 
                    autocomplete="off" 
                    id="email" 
                    pattern="[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail| GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)" 
                    ng-model="email"
                    ng-change = "rtemail();"
                    onkeyup="email_validate();"    
                    required>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="email_validate" 
                    ng-show="frm.email.$dirty && frm.email.$error.required" 
                    ng-bind = "chk_valid">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    ng-bind = "chk_valid1">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="email_validate2" 
                    ng-show="frm.email.$dirty && frm.email.$error.pattern" 
                    ng-bind = "chk_valid_email">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="email_validate3"
                    ng-modal = "rt_email"
                    ng-show  = "!frm.email.$error.pattern && !frm.email.$error.required"
                    ng-bind  = "same_email"
                    >
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="email_validate3"
                    ng-modal = "rt_email"
                    ng-show  = "!frm.email.$error.pattern"
                    ng-bind  = "same_email2"
                    >
                    </label>
                </div>
                <div class="form-group">
                    <input 
                    class="form-control" 
                    type="text" 
                    name="phone" 
                    placeholder="Phone-Number" 
                    autocomplete="off" 
                    ng-model="phone" 
                    ng-change = "rtemail();"
                    id="failure" 
                    onkeyup="phone_validate();" 
                    pattern="[0-9]{10}" 
                    required
                    ng-class = "{'error': (frm.phone.$dirty && frm.phone.$error.required) || (frm.phone.$dirty && frm.phone.$error.pattern) || same_phone || same_phone2}">
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="phone_validate" 
                    ng-show="frm.phone.$dirty && frm.phone.$error.required" 
                    ng-bind = "chk_phone">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    ng-bind = "chk_phone1">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="phone_validate" 
                    ng-show="frm.phone.$dirty && frm.phone.$error.pattern" 
                    ng-bind = "chk_phone_valid">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="phone_validate1" 
                    ng-show  = "!frm.phone.$error.pattern && !frm.phone.$error.required" 
                    ng-bind = "same_phone">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="phone_validate2"
                    ng-modal = "rt_email"
                    ng-show  = "!frm.phone.$error.pattern"
                    ng-bind  = "same_phone2"></label>
                </div>

                <div class="form-group">
                  <input 
                  class="form-control" 
                    type="password" 
                    name="password" 
                    placeholder="Password" 
                    ng-model="password" 
                    id="password"
                    onkeyup="password_validate();" 
                    pattern="[a-zA-Z0-9]{6,13}"
                    data-toggle = "password"
                    required>
                  <span id="password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="password_validate" 
                    ng-show="frm.password.$dirty && frm.password.$error.required" 
                    ng-bind = "chk_pass">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    ng-bind = "chk_pass1">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    id="password_validate" 
                    ng-show="frm.password.$dirty && frm.password.$error.pattern" 
                    ng-bind = "chk_pass_valid">
                    </label>
                  </div>

                  <div class="form-group">
                    <input 
                    class="form-control" 
                    type="password" 
                    name="password_repeat" 
                    placeholder="Password (repeat)" 
                    ng-model = "password_repeat" 
                    id="password_repeat" 
                    onkeyup="cnfm_pass_validate();"
                    data-toggle = "password_repeat" 
                    required>
                  <label 
                    style="color: red;float: right;font-size: 11px;" 
                    ng-show="frm.password_repeat.$dirty && frm.password_repeat.$error.required" 
                    ng-bind = "cnf_chk_pass">
                    </label>
                    <label 
                    style="color: red;float: right;font-size: 11px;" 
                    ng-show="frm.password_repeat.$dirty" 
                    ng-bind = "cnf_pass_validate">
                    </label>
                    <label
                    style="color: red;float: right;font-size: 11px;"
                    id="password_repeat_validate"
                    ></label>
                  </div>

                <input 
                type="radio" 
                name="gender" 
                ng-model="gender" 
                value="M" 
                onkeyup="gen_validate();" 
                required>
                <label>&nbsp;Male<sup><label style="color: red;font-size: 11px;" id="gender_validate_m"></label></sup></label>
                <span>&nbsp;&nbsp;</span>
                <input 
                type="radio" 
                name="gender" 
                value="F" 
                ng-model="gender"
                onkeyup="gen_validate();" 
                required>
                <label>Female<sup><label style="color: red;font-size: 11px;" id="gender_validate_f"></label></sup></label>
                
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label">
                        <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="checkbox" 
                        ng-model="checkbox" 
                        id="checkbox"
                        onkeyup="chk_validate();" 
                        required>I agree to the license terms.
                        <span><label style="color: red;font-size: 11px;" id="checkbox_validate"></label></span></label></div>
                </div>
                <div class="form-group">
                    <button 
                    class="btn btn-primary btn-block" 
                    type="submit" 
                    data-bs-hover-animate="pulse" 
                    ng-click="get_user_validate()"
                    ng-disabled = "frm.$invalid || same_email || same_email2 || same_phone"
                    name="signup"
                    onclick="get_user_validate();" 
                     
                    id="again_dis"
                    data-toggle = "modal" data-target="#myModal">
                        <i class="fa fa-user-plus rubberBand animated"></i>&nbsp; &nbsp;Sign Up
                    </button>
                </div>
                <a href="login" class="already">You already have an account? Login here.</a>
                <a href="tutorreg" class="already">Tutor? Register here.</a>
            </form>
        </div>
    </div>
    <div class="footer-basic" style="margin-top:100px;">
        <footer>
            <div class="social"><a href="#" data-aos="flip-right" style="background-color:#000000;color:rgb(255,255,255);"><i class="icon ion-social-instagram"></i></a><a href="#" data-aos="flip-right" style="background-color:#ffd600;color:rgb(255,255,255);"><i class="icon ion-social-snapchat"></i></a>
                <a
                    href="#" data-aos="flip-right" style="background-color:#1d0aff;color:rgb(255,255,255);"><i class="icon ion-social-twitter"></i></a><a href="#" data-aos="flip-right" style="color:rgb(255,255,255);background-color:#0500ff;"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">AdHYaPak © 2019</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/angular_controller.js"></script>
    
</body>
</html>