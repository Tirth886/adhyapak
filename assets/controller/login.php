<?php 
	session_start();
	include_once("connection.php");
	if(isset($_POST['login_'])){
		// echo "JOO";exit();
		$email 	   = trim(strtolower($_POST['email']));
		$password  = trim($_POST['password']);
		
		if(empty($email) && empty($password)){
			$empty_email    = "email required";
			$empty_password = "password reqired"; 
		}else if (!preg_match("/^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)$/",$email)) {
			$empty_email = "example : xyz@domainame.com";
		}
		else{
			$selct_reg_user = "SELECT * FROM user WHERE email='$email' && password='$password'";
			$exe_query  = $con->query($selct_reg_user);
			$fetch_user = $exe_query->fetch_object();
			if(@count($fetch_user)==1){
				$_SESSION['uid']    = $fetch_user->id;
				$_SESSION['uname']  = $fetch_user->name;
				$_SESSION['uemail'] = $fetch_user->email;
				$_SESSION['uphone'] = $fetch_user->phone;
				$_SESSION['ustatus']= true;
				if(isset($_POST['rmem'])){
					setcookie("uemail",$fetch_user->email,time()+1800);
					setcookie("upass",$fetch_user->password,time()+1800);
				}else{}
				header("Location:././homed");
			}else{

				$invalid_status = "Invalid user";
			}
		}
	}
?>