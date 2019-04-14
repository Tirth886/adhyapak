<?php 

	session_start();
	include_once("../connection.php");

	$code = $_POST['code'];

	$deletequs  = "DELETE FROM `allquestions`,`allreplies` USING `allquestions`,`allreplies` WHERE allquestions.code = '$code' AND allquestions.code = allreplies.code";
	$exe = $con->query($deletequs);
	
	$deletequs1 = "DELETE FROM `allquestions` WHERE code = '$code'";
	$exe1 = $con->query($deletequs1);
	// print_r($exe);
	if($exe || $exe1){
		$data['response'] = 'sucess';
		$data['message']  = 'Deleted sucessfully';
	}
	else{
		$data['response'] = 'failure';
		$data['message']  = 'Something Went Wrong';	
	}
	print_r(json_encode($data));


?>