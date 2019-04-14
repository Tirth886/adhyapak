<?php 
	date_default_timezone_set("asia/calcutta");	
	// include_once("assets/controller/sendquestion/answer.php");

	include("assets/controller/connection.php");
	
	// session_start();
	// print_r($con);
	if(isset($_POST['new_answer'])){
		// echo "Hii";
		$rid 	 = $_SESSION['uid'];
		// $uname  = $_SESSION['uname'];
		$answers = @trim(strtolower($_POST['answer']));
		$date 	 = date('Y-m-d H:i:s');
		$code    = $_POST['code'];
		if(empty($answers)){
			$error_ans = "Required";
		}else{
			if(!empty($answers)){

				$select_same_answer = "SELECT `answers` FROM `allreplies` WHERE `answers` = '$answers' ";
				$exe_sme_ans   		=  $con->query($select_same_answer);
				$fetch_sme 			= $exe_sme_ans->fetch_object();
				// echo "<pre>";
				// print_r($fetch_sme);
				if(@$fetch_sme->answers == $answers){
					$error_ans = "This answer already reply.";
				}else{
					$insert_replies = "INSERT INTO `allreplies` (`rid`,`answers`,`date`,`code`) VALUES ('$rid','$answers','$date','$code')";
					$exe_replies = $con->query($insert_replies);
					if($exe_replies){
					}else{
						$replies_error = "something Went Worng";
					}
				}
			}else{}
		}
	}
?>