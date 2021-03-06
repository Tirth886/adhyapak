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
  <body ng-app = "myApp4" ng-controller = "tutorCtrl">
   
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
   			<li class="active">
   				<a href="#">
   					<i class="fa fa-search rubberBand animated"></i>&nbsp;&nbsp;&nbsp;&nbsp;Find Tutor's</a>
   			</li>
   			
   			<li>
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
   				<a href="#" ng-click = "feedback();" class="download"><i class="fa fa-paper-plane-o rubberBand animated"></i>&nbsp;&nbsp;<span ng-bind = "feedbackt">Feedback</span></a>
   			</li>
<!--    			<li>
   				<a href="#" class="download"><i class="fa fa-volume-control-phone rubberBand animated"></i> Contact Us</a>
   			</li> -->

   		</ul>
   	</nav>
 
	<i class="fa fa-align-justify" id="sidebarCollapse" style="font-size: 30px;color: #ccc;padding: 10px;"></i>
		<div class="content" style="margin-top: 50px;margin-left: -50px;padding: 50px;" ng-init = "searchtutor();">
			<p style="color:rgba(100,100,15,0.5);font-size: 35px;font-weight: bolder;margin: 0;" class="adjust pulse animated">
				<i class="fa fa-quote-left" style="font-size:54px"></i>
					Study nature, love nature, stay close to nature.<br>It will never fail you
				<i class="fa fa-quote-right" style="font-size:54px"></i>
				<br>
				<label style="font-size: 15px;float: right;">-Frank Lloyd Wright</label>
			</p>
			<p style="font-size: 2px;font-weight: bolder;margin: 0;"></p>
		<br><br><br><br>
		<div class="box">
		  <div class="container-3">
		      <span class="icon"><i class="fa fa-search"></i></span>
		      <input type="search" id="search" placeholder="Search..." ng-model = "search"/>
		  </div>
		</div><!-- {{search}} -->
		<br><br><br>
		<div class="row">
			<div class="col-md-4" ng-repeat = "x in tutors | filter : search as result">
				 <div class="card hovercard" style="width: 280PX;">
                <div class="cardheader"></div>
                <div class="avatar">
                    <img alt="" src="assets/img/{{x.profile}}">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" ng-bind-html = "x.name"></a>
                    </div>
                    <div class="desc fa fa-envelope" ng-bind-html = "x.email"></div><br>
                    <div class="desc fa fa-volume-control-phone" ng-bind-html = "x.phone"></div><br>
                    <div class="desc fa fa-address-card" ng-bind-html = "x.address"></div><br>
                    <div class="desc fa fa-book"  ng-bind-html = "x.subject"></div><br>
                    <div class="desc fa fa-rupee" ng-bind-html = "x.fee"></div>
                </div>
                <button class="btn btn-danger" ng-click = "sendtutor(x.id,x.name,x.email);" style="border-radius: 0 0 0 0;">send</button>
            </div>
			</div>	 
		</div>

    <div class="media border p-3" style="border-color: red;color: red;opacity: 0.35;" ng-show = "error==true">
          <label ng-bind = "message"></label>
    </div>
      <div class="media border p-3" style="border-color: red;color: red;opacity: 0.35;" ng-show = "result.length==0">
            <label ng-bind = "nosearch"></label>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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