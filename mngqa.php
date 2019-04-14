<?php 
	
	session_start();
	if(@!$_SESSION['ustatus']==true){
		header("location: login");
	}else{}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <noscript><meta http-equiv="refresh" content="0; URL=/disqus/assets/js/noscript/index.html"/></noscript>

    <title>Dashboard</title>
  </head>
  <body ng-app = "myApp3" ng-controller = "mngqusCtrl">
   
   <div class="wrapper">
   	<nav id="sidebar">
   		<div class="sidebar-header">
   			<center><h2> <i class="fa fa-pencil-square-o rubberBand animated"></i> AdHYapaK </h5></center>
   			<center><h5> <i class="	fa fa-user-circle-o rubberBand animated"></i> <?php echo $_SESSION['uname']; ?> </h5></center>
   			<center><h6 style="font-size: 10px;"><i class="fa fa-envelope rubberBand animated"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['uemail']; ?></h6></center>
   			<center><h6 style="font-size: 10px;"><a href="#"><i class="fa 	fa fa-phone-square rubberBand animated"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['uphone']; ?></h6></center><br>
   			<center>
   				<a class="nav-link download" href="assets/controller/logout.php" style="color: white;background: rgba(10,10,10,0.5);"> 
        	<i class="fa fa-caret-square-o-left"></i>&nbsp;Logout
        	<span class="sr-only"></span></a>
      </center>
   		</div>
   		
   		
   		       <ul class="list-unstyled components">
        <li>
          <a href="homed">
            <i class="fa fa-search rubberBand animated"></i>&nbsp;&nbsp;&nbsp;&nbsp;Find Tutor's</a>
        </li>
        
        <li class="active">
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-quora rubberBand animated"></i>&nbsp;&nbsp;&nbsp;&nbsp;Disqu's</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="askreply">Ask and Reply</a>
            </li>
            <li>
              <a href="mngqa">Manage Question</a>
            </li>
          </ul> 
        </li>
        <li>
          <a href="sie"><i class="fa fa-info-circle rubberBand animated"></i>&nbsp;&nbsp;&nbsp;&nbsp;SIE<br><lable style="font-size: 15px;color: #ccc;">(Share Interview Experience)</lable></a>
        </li>
      </ul>   		
   		<ul class="list-unstyled CTAs">
   			<li>
   				<a href="#" class="download"><i class="fa fa-paper-plane-o rubberBand animated"></i> Feedback</a>
   			</li>
   			<li>
   				<a href="#" class="download"><i class="fa fa-volume-control-phone rubberBand animated"></i> Contact Us</a>
   			</li>

   		</ul>
   	</nav>
    <form method="post" novalidate name="frm" style=" width: 100%;">
  <i class="fa fa-align-justify" id="sidebarCollapse" style="font-size: 30px;color: #ccc;padding: 15px;"></i><br><br><br>
        <div class="box" style="margin-left: 50px;">
          <div class="container-3">
              <span class="icon"><i class="fa fa-search"></i></span>
              <input type="search" ng-disabled = "error" id="search" ng-model = "search" placeholder="Search Question . . . ." />
          </div><!-- {{search}} -->
        </div>
        <br><br>
        <div style="padding: 50px;" ng-init = "mnguserqus();"> 
  <div class="row">
        <div class="col-md-12">
              <div class="media border p-3" ng-repeat = "x in myquestion | filter : search as result" style="word-wrap: all;">
    <div class="media-body" id="{{x.par_code}}" style="word-wrap: all;">
      <p class="setting" style="font-size: 20px; text-align: justify-all; word-wrap:all;color: black;font-weight: 500" ng-bind-html = "x.question"></p>
      <div class="media p-3" ng-repeat = "y in dataans" id="{{y.recodepar}}" style="margin-bottom: -20px;">
              <div class="media-body" id="{{y.recodepar}}" ng-if = "x.par_code == y.recodepar">
                <h7 ng-bind = "y.name" style= "font-size: 20px;color: black;font-weight: 500;" ></h7><small class="setting" ng-bind-html = "y.email" style="font-weight: bolder;"></small><small><i ng-bind-html = "x.date" style="color: black;font-size: 15px;font-weight: 500;"></i></small><br>
                <p class="setting1" style="font-size:15px;color: black;text-align: justify-all; word-wrap:all;" ng-bind-html = "y.answers"></p>
              </div>
            </div><br> 
          <a href="#" class="download" style="padding: 10px;background: blue;opacity: 0.5;border-radius: 10px;color: white;" ng-click = "updaterec(x.qid,x.question,x.date);">Update</a>
          &nbsp;&nbsp;<a class="download" style="cursor: pointer;padding: 10px;background: red;opacity: 0.6;color:white;border-radius: 10px;" ng-click = "deleterec(x.par_code, $index);">Delete</a>
          <br>
          <br>
          <div>
            <label style="color: red;" ng-bind-html = "uperror"></label>
          </div>

    </div>
  </div>
        </div>
      </div>
      <div ng-if = "result.length === 0 && !error">
        <div class="media border p-3" style="border-color: red;color: red;opacity: 0.5;">
          <label ng-bind-html = "nosearch"></label>
        </div>
      </div>
        <div ng-show = "error" style="border: 1px solid black;padding: 10px;opacity: 0.5;color: red;">
            <label  ng-bind = "error"></label>
        </div>
      </div>
   </div>
      <div class="footer-basic">
          <footer>
              <div class="social"><a href="#" data-aos="flip-right" style="background-color:#000000;color:rgb(255,255,255);"><i class="icon ion-social-instagram"></i></a><a href="#" data-aos="flip-right" style="background-color:#ffd600;color:rgb(255,255,255);"><i class="icon ion-social-snapchat"></i></a>
                  <a
                      href="#" data-aos="flip-right" style="background-color:#1400ff;color:rgb(255,255,255);"><i class="icon ion-social-twitter"></i></a><a href="#" data-aos="flip-right" style="background-color:#1400ff;color:rgb(255,255,255);"><i class="icon ion-social-facebook"></i></a></div>
              <p class="copyright">AdHYaPak © 2019</p>
          </footer>
      </div>
    </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript" src="assets/js/angular_controller.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/homed.js"></script>
    
</html>