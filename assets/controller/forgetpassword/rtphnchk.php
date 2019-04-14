<?php 
	include_once("../connection.php");
	
	$email = @trim(strtolower($_POST['email']));
	$phone = @trim($_POST['phone']);

	if($email && $phone){
		$check_user = "SELECT email,password,phone FROM user WHERE email='$email' AND phone='$phone'";
		$exe_check_user = $con->query( $check_user);
		$fetch_rec      = $exe_check_user->fetch_object();
		if(@count($fetch_rec) == 1){
		}else{
			$select_phone = "SELECT phone FROM user WHERE email='$email'";
			$exe_user_phone = $con->query($select_phone);
			$fetch_user_phone = $exe_user_phone->fetch_object();
			if(@count($fetch_user_phone) == 1){
				$phone = $fetch_user_phone->phone;
				$check_user_  = "SELECT email,phone FROM user WHERE email='$email' AND phone NOT LIKE '$phone'";
				$exe_check_user_ = $con->query($check_user_);
				$fetch_rec_      = $exe_check_user_->fetch_object();
				// print_r(json_encode($fetch_rec));
				$data['invalidphone'] = "number not match";
				print_r(json_encode($data));
			}else{}
		}
	}
?>