<?php 
	session_start();
	include_once("connection.php");

	$feedback = $_POST['feedback'];
	$uid = $_SESSION['uid'];


	// print_r($feedback);
	$select = "SELECT `uid` FROM `feedback` WHERE `uid` = '$uid'";
	$exe = $con->query($select);
	$fetch = $exe->fetch_object();
	if(@$fetch->uid == $uid){
		$update = "UPDATE `feedback` SET `text`='$feedback' WHERE `uid` = '$uid'";
	    $exeu = $con->query($update);
	    if($exeu){
	    	$data['status'] = "update";
	    }else{}
	}else{
		$insert = "INSERT INTO `feedback` (`uid`,`text`) VALUES ('$uid','$feedback')";
		$exe = $con->query($insert);
		if($exe){
			$data['status'] = "send";
		}else{}
	}
	print_r(json_encode($data));


?>