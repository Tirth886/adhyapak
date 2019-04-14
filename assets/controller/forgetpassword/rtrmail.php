<?php 
	include_once("../connection.php");
	$email = @trim(strtolower($_POST['email']));

	if($email){
		$select_same_user = "SELECT email FROM user WHERE email='$email'";
		$exe_same_user 	  = $con->query($select_same_user);
		$fetch_same_user  = $exe_same_user->fetch_object();
		if(@$fetch_same_user->email == $email)
		{
		}else{
			$data['invalidemail'] = "email not exist";
			print_r(json_encode($data));
		}
	}else{}

?>