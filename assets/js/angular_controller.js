/* While performing the database side work we need the pre define parameter $http and $scope or 
	 yes to use ng-bind-html have to use ngSanitize dependencies */
angular.module('myApp',['ngSanitize']).controller('regCtrl',function($scope,$http){  	

	
	$scope.chk_name        = "name required"; 
	$scope.chk_name_valid  =  "example : Jhon Due";

	$scope.chk_valid 	   = "email required";
	$scope.chk_valid_email = "example@domain.com";

	$scope.chk_phone	   = "number required";
	$scope.chk_phone_valid = "example : 942*****4";

	$scope.chk_pass		   = "password required";
	$scope.chk_pass_valid  = "min 6 and max 13 only alphanumeric";

	$scope.cnf_chk_pass	   = "confirmation required";
	// $scope.cnf_chk_pass_valid = "password must match";



	//  This function call by itself when user click on the register button

	$scope.blacrec = function (response){

		// Clearing the value after clicking on submit

		$scope.getname	 	   = ""; 
		$scope.email 		   = "";
		$scope.phone 		   = "";
		$scope.password        = "";
		$scope.password_repeat = "";
		$scope.gender 		   = "";
		$scope.checkbox        = "";

		// after submittion clearing the Error which is requried

		$scope.chk_name        = "";
		$scope.chk_valid 	   = "";
		$scope.chk_phone       = "";
		$scope.chk_pass        = "";
		$scope.cnf_chk_pass    = "";
	}

	// Email Already Exist While typing Without click on the button

	$scope.rtemail = function (){
		
		// Getting Only Email

		var getemail 	= $scope.email;
		var getphone    = $scope.phone;
		// Sending up the data to sme_email.php 

		var mydata      = "email="+getemail+'&phone='+getphone;

		$http({
			method : 'POST',url : 'assets/controller/sme_email.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			$scope.same_email = response.data.emailerror;
			$scope.same_phone = response.data.phoneerror;
			// console.log($scope.same_phone); 
			// console.log($scope.same_email); 
		});
	}

	/* function when user click on the Sig nup Button name is define into the register.php */

	$scope.get_user_validate = function(response){  

		//Getting Value From The Form 

		var getname  	= $scope.getname; /* Do not use the $scope.name while getting the value from the Form */
		var getemail 	= $scope.email;
		var getphone 	= $scope.phone;
		var getpassword = $scope.password;
		var getconfirm  = $scope.password_repeat;
		var getgender   = $scope.gender;
		var checkbox    = $scope.checkbox;
		// console.log(getemail);
		// console.log(getgender);
		var mydata 		= "name="+getname
						  +'&email='+getemail
						  +'&phone='+getphone
						  +'&password='+getpassword
						  +'&password_repeat='+getconfirm
						  +'&gender='+getgender
						  +'&checkbox='+checkbox;
        
        // console.log(mydata);
        // Sending mydata to user_reg.php controller by $http post method

		$http({
			method : 'POST',url : 'assets/controller/reg.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			console.log(response);
			$scope.cnf_pass_validate = response.data.chfre;  
			$scope.same_email2	     = response.data.emailerror2;
			$scope.same_phone2       = response.data.phoneerror2;
			$scope.suc		 	 	 = response.data.sucess;
			$scope.fail		 	 	 = response.data.failure;
			
			$scope.chk_name1 = response.data.ferror;         
			$scope.chk_valid1 =	response.data.eerror;
			$scope.chk_phone1 = response.data.perror;
			$scope.chk_pass1= response.data.paerror;
			$scope.gerror = response.data.gerror;
			console.log($scope.chk_name1);
			


			$scope.blacrec();
			// console.log($scope.same_email2);
			// $scope.frm.$dirty;
		});
	}

});

// Forgot Password Email Check Angular app and Controller

angular.module('myApp1',['ngSanitize']).controller('fpCtrl',function($scope,$http){

	$scope.chk_valid = "email required";
	$scope.chk_valid_email = "example : jhon@domain.com";
	$scope.chk_phone = "phone required";
	$scope.chk_phone_valid = "example : 94******54";

	$scope.default = function (){
		$scope.email = "";
		$scope.phone = "";

		$scope.chk_valid = "";
		$scope.chk_phone = "";
	}

	$scope.rtmail = function (){

		var getemail = $scope.email;

		var  mydata  = "email="+getemail;

		$http({
			method : 'POST',url : 'assets/controller/forgetpassword/rtrmail.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			$scope.chk_email_chk = response.data.invalidemail;		
		});    	 
	}

	$scope.rt_phone_chk = function (){


		var getemail = $scope.email;
		var getphone = $scope.phone;

		var mydata   = "email="+getemail+'&phone='+getphone;
		$http({
			method : 'POST',url : 'assets/controller/forgetpassword/rtphnchk.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			$scope.chk_phone_chk = response.data.invalidphone;
			// console.log(response);
		}); 
	}

	$scope.check = function (){

		var getemail = $scope.email;
		var getphone = $scope.phone;

		var mydata   = "email="+getemail+'&phone='+getphone;

		// console.log(mydata);

		$http({
			method : 'POST',url : 'assets/controller/forgetpassword/fgtpass.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			$scope.chk_phone_chk = response.data.invalidphone;
			$scope.mail_success  = response.data.sucess;
			$scope.mail_failure  = response.data.failure;
			$scope.default();

			console.log($scope.mail_success);
		}); 
	}
});

// Question and Answer App and Controller

var mydata = ""
angular.module('myApp2',['ngSanitize']).controller('qaCtrl',function($scope,$http){

// For Using $interval we have to first defined in controller as parameter

	// $interval(function () {
		
	// $scope.gettingquestionanswer();      

 //  }, 18000000);

	$scope.nosearch = "no search result found . . . !";

	$scope.reply    = "reply";

	$scope.default_qs = function(){

		$scope.add = "";
		
	}

	$scope.gettingquestionanswer = function (){
		
		$http({
			method : 'POST',url : 'assets/controller/sendquestion/getquestionans.php', 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			if(response.data.result == "success"){
				$scope.myquestion = response.data.data;
				$scope.dataans   = response.data.dataans;
				// $scope.rows    = response.data.datarows;
				// console.log($scope.rows);
				$scope.errmsg    = false; 
			}else{
				$scope.errmsg    = true;
				$scope.error     = response.data.message;
			}
		});	
	}

	$scope.chk_same_qs = function (){
	var getqs = $scope.add;
	// console.log(getqs);

	var mydata = "questions="+getqs;
	
	$http({
			method : 'POST',url : 'assets/controller/sendquestion/ch_rt_qs.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			$scope.sme_qus = response.data.question_sme1;
		});
	}

	$scope.send_qs = function(){
		var getqs = $scope.add;
		// console.log(getqs);
		// gettingquestionanswer();
		
		var mydata = "questions="+getqs;
		// console.log(mydata);
		$http({
			method : 'POST',url : 'assets/controller/sendquestion/question.php', 
			data : mydata, 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			$scope.add_requred		= response.data.ques_err;
			$scope.question_sucess  = response.data.question_sucess;
			$scope.question_failure = response.data.question_failure;
			$scope.sme_qus 			= response.data.question_sme;

			$scope.default_qs();
			$scope.gettingquestionanswer();
			
		});
	}

});

angular.module('myApp3',['ngSanitize']).controller('mngqusCtrl',function($scope,$http,$interval){

	$scope.nosearch = "No search result found";

	$scope.mnguserqus = function (){
		
		$http({
			method : 'POST',url : 'assets/controller/sendquestion/mnguserqus.php', 
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			if(response.data.result == "success"){
				$scope.myquestion = response.data.data;
				$scope.dataans   = response.data.dataans;
				$scope.rows    = response.data.datarows;
				// console.log($scope.rows);
				$scope.errmsg    = false; 
			}else{
				$scope.errmsg    = true;
				$scope.error     = response.data.message;
			}
		});	
	}

	$scope.deleterec = function(qcode,index){
		
		if(confirm("sure to delete ?")){
			var mydata 		= "code="+qcode;
			$http({
				method : 'POST',url : 'assets/controller/sendquestion/deletrecqus.php', 
				data : mydata, 
				headers : {
					'Content-Type':'application/x-www-form-urlencoded'
				}
			}).then(function(response){
				// console.log(response);
				$scope.myquestion.splice(index, 1);
				// $scope.mnguserqus();
			});

		}else{}
	}

	$scope.updaterec = function(qid,qqus,qdate){

		// console.log(qid);
		// console.log(qqus);
		var myuques     = prompt("Your Question :",qqus);
		var mydata		= "qqus="+myuques+'&qid='+qid+'&date='+qdate;
		if (myuques == null || myuques == "") {
			$scope.uperror = "required";	
			// console.log($scope.uperror);
		}else{
			// console.log(mydata);
			$http({
				method : 'POST',url : 'assets/controller/sendquestion/updaterecqus.php', 
				data : mydata, 
				headers : {
					'Content-Type':'application/x-www-form-urlencoded'
				}
			}).then(function(response){
				$scope.mnguserqus();
				if(response.data.response == "Update Successfully"){
					$scope.errors = false;
				}else{
					$scope.errors  = true;
					$scope.uperror = response.data.msgerro;	
				}
			});
		}

	}
});


angular.module('myApp4',['ngSanitize']).controller('tutorCtrl',function($scope,$http,$interval){
	$interval(function(){
		$scope.searchtutor();	
	},1000);

	$scope.feedbackt = "Feedback";
	$scope.feedback  = function (){
		var feedback = prompt("Enter Your Feedback");
		if(feedback=="" || feedback==null){
		}else{
			var mydata = "feedback="+feedback;
			// console.log(mydata);
			$http({
				method : 'POST',url : 'assets/controller/feedback.php', 
				data : mydata, 
				headers : {
					'Content-Type':'application/x-www-form-urlencoded'
				}
			}).then(function(response){
				console.log(response);
				if(response.data.status == "send"){
					$scope.feedbackt = "Feedback Sent";
				}
				else if(response.data.status == "update"){
					$scope.feedbackt = "Feedback Update";
				}else{}
			});
		}
	}

	$scope.sendtutor = function(tutorid,tutorname,tutoremail){
		// console.log(tutorid);
		var checkempty = prompt("Want "+tutorname+" as your tutor ? describe yourself in short");
		if(checkempty=="" || checkempty==null){
			console.log("no");
		}else{
			var tutoremail = tutoremail;
			var mydata	   = 'temail='+tutoremail+"&tutorid="+tutorid+"&message="+checkempty;
			// console.log(mydata);
			$http({
				method : 'POST',url : 'assets/controller/findtutor/sendtutor.php', 
				data : mydata, 
				headers : {
					'Content-Type':'application/x-www-form-urlencoded'
				}
			}).then(function(response){	
				// console.log(response.data);
				if(response.data.status == "failure"){
					alert(response.data.already);
				}else if(response.data.status == "fail"){
					alert(response.data.sendfail);
				}else if(response.data.status == "sucess"){
					alert(response.data.sendsuc);
				}else if(response.data.status == "check"){
					alert(response.data.failure);
				}else{}
			});
		}
	}

	$scope.nosearch = "No search result found";
	$scope.searchtutor = function(){
		// console.log("hl");
		$http({
			method : 'POST',url : 'assets/controller/findtutor/findtutor.php',
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response);
			if(response.data.response == "sucess"){
				$scope.tutors = response.data.mydata;
				$scope.error = false;
			}else{	
				$scope.error = true;
				$scope.message = response.data.message;
			}
		});
	}

});

var app5 = angular.module('myApp5',['ngSanitize']);
app5.controller('regtutorCtrl',function($scope,$http){

	$scope.gender_chk = "*";


	$scope.ImageValidate = function(val){
	    // console.log('test function');
	    $scope.ngInput = val;
	    // $scope.byDefault();
	}
	// console.log("he");


	$scope.signup = function (timage){

		var fname     = $scope.fname;
		var lname     = $scope.lname;
		var email     = $scope.email;
		var phone     = $scope.phone;
		var sub       = $scope.sub;
		var address   = $scope.address;
		var gender    = $scope.gender;
		var fee		  = $scope.fee;
		$scope.imagename = timage;
		var chk 	  = $scope.chk;

		var mydata 	  = "fname="+fname
						+'&lname='+lname
						+'&email='+email
						+'&phone='+phone
						+'&sub='+sub
						+'&address='+address
						+'&gender='+gender
						+'&fee='+fee
						+'&imagename='+$scope.imagename
						+'&chk='+chk;
		// console.log(mydata);
		$http({
			method : 'POST',url : 'assets/controller/findtutor/regtutor.php',
			data : mydata,
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
				// console.log(response);
				$scope.status = response.data.status_sucess;
				// $scope.status1 = response.data.status_failure;
				// $scope.status2 = response.data.failure;
				$scope.ferror = response.data.ferror;
				$scope.lerror = response.data.lerror;
				$scope.eerror = response.data.eerror;
				$scope.perror = response.data.perror;
				$scope.serror = response.data.serror;
				$scope.aerror = response.data.aerror;
				$scope.gerror = response.data.gerror;
				$scope.feerror = response.data.feerror;
				$scope.emailerror = response.data.emailerror;
				$scope.phoneerror = response.data.phoneerror;
				// $scope.byDefault();
		});		
	}


	$scope.tutorreg = function (){
	 
	    var fd        = new FormData();
	    var files     = document.getElementById('file').files[0];
	    // var imageName = files.name;
	    // console.log(imageName);
	    fd.append("file",files);

	    $http({
	    	method: 'post',url: 'assets/controller/findtutor/upload.php',
	        data: fd,
		    headers: {'Content-Type': undefined}
	    }).then(function(response){
	    	console.log(response.data.status);
	    	if(response.data.status == "sucess"){
	    		$scope.image    = response.data.imagename; 
 	    		$scope.signup($scope.image);
	    		$scope.imgerror = false;
	    	}else{
	    		$scope.imgerror = true;
	    		$scope.imageerror = response.data.imageerror;
	    	}

	    });
	}

});

app5.directive('ngFile', function () {
  return {
    restrict: 'A',
    link: function($scope, element, attrs) {
    	// console.log(element);
          element.bind('change', function() {
          if(element[0].files[0].name){
            $scope.ImageValidate('true');
          }else{}
      });
    }
  };
});

angular.module('myApp6',['ngSanitize']).controller('sieCtrl',function($scope,$http,$interval){

	

	$scope.showsie = function(){

		$http({
			method : 'POST',url : 'assets/controller/sie/showsie.php',
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response.data);
			// console.log(response.data.response);
			// $scope.showsie();
			if(response.data.response == "sucess"){

				$scope.myie = response.data.data;
				$scope.error = false;
				console.log($scope.myie);
			}else{
				$scope.error = true;
				$scope.message = response.data.message;
			}
		});

	}

	$scope.sieaddsie  = function(){
		// console.log("hello");
		var siee = $scope.sieadd;
		// console.log(siee);
		var mydata = 'sieadd='+siee;

		$http({
			method : 'POST',url : 'assets/controller/sie/addsie.php',
			data : mydata,
			headers : {
				'Content-Type':'application/x-www-form-urlencoded'
			}
		}).then(function(response){
			// console.log(response.data);
			$scope.result = response.data.sucess;
			$scope.result1 = response.data.failure;
			$scope.undefine	  = response.data.undefine;
			$scope.sme    = response.data.smeie; 
			$scope.showsie();
				$interval(function(){
			$scope.showsie();
		},1000);
			$scope.sieadd = "";
		});
	}
});