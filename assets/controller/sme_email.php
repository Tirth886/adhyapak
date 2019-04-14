<?php 
	include_once("connection.php");
	$email = @trim(strtolower($_POST['email']));
	$phone = @trim($_POST['phone']);
	if($email){
		$select_same_user = "SELECT `email`,`phone` FROM `user` WHERE `email` = '$email' OR `phone` = '$phone'";
		$exe_same_user 	  = $con->query($select_same_user);
		$fetch_same_user  = $exe_same_user->fetch_object();
		// print_r($fetch_same_user);
		if(@$fetch_same_user->email == $email || @$fetch_same_user->phone == $phone)
		{
			if(@$fetch_same_user->email == $email){
				$data['emailerror'] = "email already exist";
			}else{}
			if(@$fetch_same_user->phone == $phone){
				$data['phoneerror'] = "number already exist";
			}else{}
		}else{}
	}else{}

	print_r(json_encode($data));
?>