<?php
	
	date_default_timezone_set("asia/calcutta");	

	include_once("../connection.php");
	session_start();


	$user   = $_SESSION['uid'];
	$addsie = @trim(strtolower(ucfirst($_POST['sieadd'])));
	$date 	  = date('Y-m-d H:i:s');
	// print_r($addsie);

	if($addsie){
		$selectsame = "SELECT `ie` FROM `sie` WHERE `ie` = '$addsie'";
		$exesame    = $con->query($selectsame);
		$fetchsame  = $exesame->fetch_object();
		if(@$fetchsame->ie == $addsie){
			$data['smeie'] = "already send";
		}else{
			$insertie = "INSERT INTO `sie` (`user`,`ie`,`date`) VALUES ('$user','$addsie','$date')";
			$exe = $con->query($insertie);
			$id  = $con->insert_id;
			// print_r($id);
			if($exe && $id){
				$selectun = "SELECT `ie` FROM `sie` WHERE `id` = '$id'";
				$exe 	  = $con->query($selectun);
				$fetchun  = $exe->fetch_object();
				if(@$fetchun->ie=="undefined"){
					$deleteun = "DELETE FROM `sie` WHERE `id` = '$id'";	
					$exede = $con->query($deleteun);
					if($exede){
						$data['undefine'] = "required";
					}else{}
				}else{
					$data['sucess'] = "Insert Sucessfully";
				}
			}else{
				$data['failure'] = "Something Went Wrong";
			} 
		} 
	}else{}

	print_r(json_encode($data));
?>