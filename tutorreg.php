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
	<title></title>
</head>
<body ng-app = "myApp5" ng-controller = "regtutorCtrl">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="margin-top:0px;margin-bottom:-119px;height:150px;">
        <div class="container"><a class="navbar-brand" href="#" style="margin-left:-18px;padding:12px;margin-top:-18px;"><img src="assets/img/logo.png" class="pulse animated" style="height:138px;margin-right:0px;margin-top:2px;"></a><button class="navbar-toggler d-none" data-toggle="collapse"
                data-target="#navcol-1"><span class="sr-only">Toggle navigation</span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search d-none"></i></label><input class="form-control d-none visible search-field" type="search" name="search" id="search-field"></div>
                 </form>
                <a href="./"><button class="btn btn-primary btn-sm" type="button" style="background-color:rgb(0,0,0);">
                    <i class="fa fa-backward"></i>
                </button></a>
            </div>
        </div>
    </nav>
    <br><br><br>
    <br><br><br>
<center>
    <div class="register-photo" style="background-color:rgb(255,255,255);margin-top:5px;width: 60%;">
        <div class="form-container">
            <form  method="post" name="frm" style="width:454px;" ng-model = "frm" novalidate>
                <h1 class="text-center pulse animated" data-bs-hover-animate="tada">Tutor Registration</h1><br><br>
                      <div class="img-section">
                        <img src="assets/img/generic-user-purple.png" class="imgCircle" height="150"  width="150" alt="Profile picture" ng-class = "{imgCircle1 : (frm.$submitted && frm.file.$error.required) || (frm.file.$dirty && frm.file.$error.required)}">
                        <span class="fake-icon-edit" id="PicUpload" style="color: balck;"><i class="fa fa-camera-retro"></i></span>
			                    <input type='file' ng-model="file" id='file' ng-required = "!ngInput" name='file' ng-file="uploadfiles" onchange="readURL(this);" class="form-control form-input Profile-input-file" required>
			                    <!-- <i class="fas fa-camera-retro"></i> -->
			            </div>
			            <br>
			            <label style="color: red;" ng-if = "imgerror" ng-bind-html = "imageerror"></label>
			            <label style="color: red;" ng-if = "emailerror" ng-bind-html = "emailerror"></label>
			            <br>
			            <label style="color: red;" ng-if = "phoneerror" ng-bind-html = "phoneerror"></label>
                        <label style="color: green;" ng-if = "status" ng-bind-html = "status"></label>
                        <!-- <label style="color: red;" ng-if = "status1" ng-bind-html = "status1"></label> -->
			            <!-- <label style="color: red;" ng-if = "status2" ng-bind-html = "status2"></label> -->
			            <br><br>
                <div class="form-inline form-group" style="border: 0px solid black"> 
                    <input 
                    class="form-control" 
                    type="text" 
                    name="fname" 
                    placeholder="First Name" 
                    autocomplete="off" 
                    ng-model = "fname"
                    pattern="[a-zA-Z]{3,15}"
                    required
                    style="width: 330px;"
                    ng-class = "{error : (frm.$submitted && frm.fname.$error.required) || (frm.fname.$dirty && frm.fname.$error.required) || (frm.fname.$dirty && frm.fname.$error.pattern) || ferror}"><!-- {{fname}} -->
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input 
                    class="form-control" 
                    type="text" 
                    name="lname" 
                    placeholder="Last Name" 
                    autocomplete="off" 
                    ng-model = "lname"
                    pattern="[a-zA-Z]{3,15}"
                    required
                    style="width: 330px;"
                    ng-class = "{error : (frm.$submitted && frm.lname.$error.required) || (frm.lname.$dirty && frm.lname.$error.required) || (frm.lname.$dirty && frm.lname.$error.pattern) || lerror}">

                </div>

                <div class="form-inline form-group">    
                    <input 
                    class="form-control" 
                    type="text" 
                    name="email"
                    ng-model = "email" 
                    placeholder="Email" 
                    autocomplete="off" 
                    pattern="[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail| GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)" 
                    required
                    style="width: 330px;"
                    ng-class = "{error : (frm.$submitted && frm.email.$error.required) || (frm.email.$dirty && frm.email.$error.required) || (frm.email.$dirty && frm.email.$error.pattern) || eerror}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input 
                    class="form-control" 
                    type="text" 
                    name="phone"
                    ng-model = "phone" 
                    placeholder="Phone-Number" 
                    autocomplete="off" 
                    required
                    pattern="[0-9]{10}"
                    style="width: 332px;"
                    ng-class = "{error : (frm.$submitted && frm.phone.$error.required) || (frm.phone.$dirty && frm.phone.$error.required) || (frm.phone.$dirty && frm.phone.$error.pattern) || perror}">
                  
                </div>
                <div class="form-inline form-group">
			      
			      <input 
                    class="form-control" 
                    type="text" 
                    name="sub"
                    ng-model = "sub" 
                    placeholder="Subject you are interested (use comma if more than one)" 
                    autocomplete="off" 
                    pattern="[a-zA-Z,+.#]{1,100}" 
                    required
                    style="width: 100%;"
                    ng-class = "{error : (frm.$submitted && frm.sub.$error.required) || (frm.sub.$dirty && frm.sub.$error.required) || (frm.sub.$dirty && frm.sub.$error.pattern) || serror}">
			  </div>
			  <div class="form-inline form-group">
				  <textarea class="form-control" rows="5" ng-model = "address" id="comment" placeholder="Address" style="width: 100%;" name="address" required ng-class = "{error :(frm.$submitted && frm.address.$error.required && frm.address.$dirty) || (frm.address.$dirty && frm.address.$error.required) || aerror}"></textarea><!-- {{address}} -->
			  </div>
			  <div class="form-inline form-group">
                <input 
                type="radio" 
                name="gender" 
                value="M" 
                ng-model = "gender"
                required>
                <label>&nbsp;Male<sup><label style="color: red;font-size: 11px;" ng-show = "(frm.$submitted && frm.gender.$error.required) || (frm.gender.$dirty && frm.gender.$error.required) || gerror" ng-bind = "gender_chk"></label></sup></label>
                <span>&nbsp;&nbsp;</span>
                <input 
                type="radio" 
                name="gender" 
                value="F" 
                ng-model = "gender"
                required>
                <label>&nbsp;Female<sup><label style="color: red;font-size: 11px;" ng-show = "(frm.$submitted && frm.gender.$error.required) || (frm.gender.$dirty && frm.gender.$error.required) || gerror" ng-bind = "gender_chk"></label></sup></label>
                </div>
                <div class="form-group">
                	<input 
                    class="form-control" 
                    type="text" 
                    name="fee"
                    ng-model = "fee"
                    pattern="[0-9]{4}" 
                    placeholder="Fees max 9000 (rs)" 
                    autocomplete="off" 
                    required
                    style="width: 180px;" ng-class = "{error : (frm.$submitted && frm.fee.$error.required) || (frm.fee.$dirty && frm.fee.$error.required && frm.fee.$dirty) || (frm.fee.$dirty && frm.fee.$error.pattern) || feerror}">
                </div>
                <div class="form-inline form-group">
                    <div class="form-check"><label class="form-check-label">
                        <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="checkbox"
                        ng-model = "chk" 
                        required
                        value="checked">I agree to the license terms.
                        <span><label style="color: red;font-size: 11px;" ng-show = "(frm.$submitted && frm.chk.$error.required && frm.chk.$dirty) || 
                        (frm.chk.$dirty && frm.chk.$error.required)" ng-bind = "gender_chk"></label></span></label></div>
                </div>
                <div class="form-group">
                    <button 
                    class="btn btn-primary btn-block" 
                    type="submit" 
                  	ng-disabled = "frm.$invalid"
                    data-bs-hover-animate="pulse" 
                    name="signup"  ng-click = "tutorreg();">
                        <i class="fa fa-user-plus rubberBand animated"></i>&nbsp; &nbsp;Register
                    </button>
                </div>
                <a href="register" class="already">Student? Register here.</a>
            </form>
        </div>
    </div>
</center>
    <div class="footer-basic" style="margin-top:100px;">
        <footer>
            <div class="social"><a href="#" data-aos="flip-right" style="background-color:#000000;color:rgb(255,255,255);"><i class="icon ion-social-instagram"></i></a><a href="#" data-aos="flip-right" style="background-color:#ffd600;color:rgb(255,255,255);"><i class="icon ion-social-snapchat"></i></a>
                <a
                    href="#" data-aos="flip-right" style="background-color:#1d0aff;color:rgb(255,255,255);"><i class="icon ion-social-twitter"></i></a><a href="#" data-aos="flip-right" style="color:rgb(255,255,255);background-color:#0500ff;"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">AdHYaPak © 2019</p>
        </footer>
    </div>

</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/register.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/angular_controller.js"></script>
</html>