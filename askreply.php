<?php 
	
	session_start();
	include_once("assets/controller/sendquestion/answer.php");
	include("assets/controller/connection.php");
	

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
	<body ng-app="myApp2" ng-controller="qaCtrl">
	 
	 <div class="wrapper" ng-init = "gettingquestionanswer();">
		<nav id="sidebar">
			<div class="sidebar-header">
				<center><h2> <i class="fa fa-pencil-square-o rubberBand animated"></i> AdHYapaK </h5></center>
				<center><h5> <i class=" fa fa-user-circle-o rubberBand animated"></i> <?php echo $_SESSION['uname']; ?> </h5></center>
				<center><h6 style="font-size: 10px;"><i class="fa fa-envelope rubberBand animated"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['uemail']; ?></h6></center>
				<center><h6 style="font-size: 10px;"><a href="#"><i class="fa   fa fa-phone-square rubberBand animated"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['uphone']; ?></h6></center><br>
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
 
		<form method="post" novalidate name="frm" style="width: 100%;">
		<i class="fa fa-align-justify" id="sidebarCollapse" style="font-size: 30px;color: #ccc;padding: 15px;"></i>
		<div class="content" style="margin-top: 0px;margin-left: -5px;padding: 40px;">
			<p style="color:rgba(100,100,15,0.5);font-size: 35px;font-weight: bolder;margin: 0;" class="adjust pulse animated">
				<i class="fa fa-quote-left" style="font-size:54px"></i>
					Successful people ask better question, and as a result, they get better answers. 
				<i class="fa fa-quote-right" style="font-size:54px"></i>
				<br>
				<label style="font-size: 15px;float: right;">-Anthony Robbins</label>
			</p>
			<p style="font-size: 2px;font-weight: bolder;margin: 0;"></p>
		<br><br>
		<div class="row">
			<div class="col-md-4">
					<textarea class="textarea" placeholder="Ask a Question . . . . . . . ." ng-model="add" ng-change = "chk_same_qs();" id = "uqus" onkeyup="quesranswer();" required></textarea>
						<label style="color: red;font-size: 15px;" ng-bind = "add_requred" id="add_requred"></label>
					<!-- {{add}} -->
					<div>
					<button ng-click = "send_qs();"  ng-disabled = "frm.$invalid || sme_qus1 || sme_qus || question_failure" class="btn btn-primary" style="margin-left: 0px;width: 100%;margin-top: 0px;margin-bottom: 0"><i class="fa fa-mail-forward rubberBand animated"></i></button>
				</div>
					<label ng-bind = "sme_qus" style="font-size: 15px;color: red;" id="sme_qus"></label>
					<label ng-bind = "sme_qus1" style="font-size: 15px;color: red;" id="sme_qus1"></label>
					<label ng-bind = "question_failure" style="font-size: 15px;color: red;" id="question_failure"></label>
					<label ng-bind = "question_sucess" style="font-size: 15px;color: green;" id="question_sucess"></label>
			</div>
			</div>
			<!-- <p style="margin-top: -50px;">Find Your Question</p> -->
			<div class="box">
			<div class="container-3">
					<span class="icon"><i class="fa fa-search"></i></span>
					<input type="search" ng-disabled = "error" id="search" ng-model = "search" placeholder="Search Question . . . ." />
			</div>
		</div>		
		<br><br><br>
			<span><label  style="font-size: 10px;color: red;"><?php echo "<br><br>".@$error_ans;  ?></label><span>
			<div class="row">
				<div class="col-md-12">
							 <div class="media border p-3" ng-repeat = "x in myquestion | filter : {'user' : search}" style="word-wrap: all;">
							 	<!-- <div> -->
					<!-- <div class="media-body">
						<h4>John Doe<small class="setting">(jon@gmail.com)</small> <small><i>February 19, 2016</i></small></h4>
						<p>Lorem ipsum...</p> -->
						<div class="media-body" id="{{x.par_code}}" style="word-wrap: all;">
			<h5 ng-bind-html = "x.user" style="word-wrap: all;"></h5>
			<!-- <small class="setting" ng-bind-html = "x.email"></small> -->
			<small><i ng-bind-html = "x.date" style="word-wrap: all;"></i></small><br>
			<p class="setting" style="font-size: 20px; text-align: justify-all; word-wrap:all;color: black;font-weight: 500" ng-bind-html = "x.question"></p>
			<a class="link-reply ankr" id="reply" name="{{x.par_code}}" ng-bind = "reply"></a>
			<!-- <a class="link-reply ankr" id="children" name="{{x.par_code}}"> -->
					<!-- <span id="tog_text">replies</span><lable ng-bind-html = "rows.numrows"></lable><label  ng-repeat = "y in datarows"></label></a> -->
					<!-- .'<div class="child-comments" id="gc-'.$par_code.'"> -->
						<div class="media p-3" ng-repeat = "y in dataans" id="{{y.recodepar}}" style="margin-bottom: -20px;">
							<div class="media-body" id="{{y.recodepar}}" ng-show = "x.par_code == y.recodepar" style="text-align: justify-all;">
								<h7 ng-bind = "y.name" style= "font-size: 20px;color: black;font-weight: 500;" ></h7><small class="setting" ng-bind-html = "y.email" style="font-weight: bolder;"></small><small><i ng-bind-html = "x.date" style="color: black;font-size: 15px;font-weight: 500;"></i></small><br>
								<p class="setting1" style="font-size:15px;color: black;text-align: justify-all; word-wrap:all;" ng-bind-html = "y.answers"></p>
							</div>
						</div>
						<!-- Reply TextArea Box -->
					<!-- <form method='POST' ng-show = "x.par_code"> -->
					<!-- <div ng-if = "x.par_code"> -->
						<!-- <form method = 'post'> -->
						
						<!-- <textarea placeholder = 'Answer . . .' class='form-text' name='new_answer' ng-model = "new_answer"></textarea>
						
						<input type='hidden' name='code' ng-model = "code" value="{{x.par_code}}">

						<button type='submit' class='btn btn-primary' name='new_answer' ng-click = "send_reply();">Reply</button> 
					 -->
					<!-- </form> -->
						<!-- <textarea placeholder = 'Answer . . .' class='form-text' name='new_answer' ng-model="answer"></textarea>
						<input type='hidden' ng-model = "code" name='code' value='{{x.par_code}}'>
						<input type='submit' class='btn btn-primary' name='new_answer' value='Reply' ng-click = "send_reply();"> -->
					<!-- </form> -->
					<!-- </div> -->
					</div>
				</div>
				</div>
			</div> 
			<div ng-if = "result.length === 0">
				<div class="media border p-3" style="border-color: red;color: red;opacity: 0.5;">
					<label ng-bind-html = "nosearch"></label>
				</div>
			</div>
			<!-- 	<div class="media border p-3" style="border-color: red;color: red;opacity: 0.35;" ng-show = "error">
					<label ng-bind = "error"></label>
				</div> -->
		</div>
			</div>
	 </div>
				</form>   
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