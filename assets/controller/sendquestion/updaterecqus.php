<?php 
	
	session_start();
	
	include_once("../connection.php");
	// print_r($con);
	date_default_timezone_set("asia/calcutta");

	$qqus = $_POST['qqus'];
	$date = date('Y-m-d H:i:s');
	$id   = $_POST['qid'];	
	$qdate= $_POST['qdate'];
	
	// Setting up the old Question
	$settingqus = $qqus;

	$updatequs   = "UPDATE `allquestions` SET `questions`= '$qqus',`date`='$date' WHERE `id` = '$id'";
	$exeupdatequs= $con->query($updatequs);
	if($exeupdatequs){

		$selectun = "SELECT `questions` FROM `allquestions` WHERE `id` = '$id'";
		$exeun    = $con->query($selectun);
		$fetchun  = $exeun->fetch_object();

		if($fetchun->questions == "undefined"){

			$updateun = "UPDATE `allquestions` SET `questions` = '$settingqus',`date` = '$qdate' WHERE `id` = '$id'";
			$exeuun   = $con->query($updateun);
			if($exeuun){
				$data['msgerro'] = "Required";
			}else{}
		}else{
			$data['response'] = "Update Successfully";
		}
	}else{
		$data['response'] = "Update Unsucessfuly";
	}
	print_r(json_encode($data));
?>