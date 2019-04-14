<?php 

	date_default_timezone_set("asia/calcutta");	
	
	session_start();
	include_once("../connection.php");
	// print_r($con);
	include_once("function.php");

	$uid 	  = $_SESSION['uid'];
	// $user     = $_SESSION['uname'];
	$question = @trim(strtolower(ucfirst($_POST['questions'])));
	$date 	  = date('Y-m-d H:i:s');
	$code 	  = generate_unique_code(4);

	if(!empty($question)){

		$select_sme_qus = "SELECT `questions` FROM `allquestions` WHERE `questions`='$question'";
		$exe_sme_qus    = $con->query($select_sme_qus);
		$fetch_object   = $exe_sme_qus->fetch_object();

		if(@$fetch_object->questions === $question){
			$data['question_sme'] = "Question already asked";
		}else{
			$insert_question = "INSERT INTO `allquestions` (`uid`,`questions`,`date`,`code`) VALUES ('$uid','$question','$date','$code')";
				$exe_ques = $con->query($insert_question);
				$id = $con->insert_id;	
			
				// print_r(json_encode($id));
			
				$select_undefined = "SELECT `questions` FROM `allquestions` WHERE id = '$id'";
				$exe_undefined  	  = $con->query($select_undefined);
				$undefined_object     = $exe_undefined->fetch_object();

				if(@$undefined_object->questions==="undefined"){
					$delete_undefined = "DELETE FROM `allquestions` WHERE id='$id'";
					$del_un = $con->query($delete_undefined);
					if($del_un){
						$data['ques_err'] = "required";
					}else{}
				}else{
					if($exe_ques){
						$data['question_sucess']  = "insert sucessfully";
					}else{
						$data['question_failure'] = "Something Went Wrong";
					}
				}
		}

	}else{
		$data['ques_err'] = "required Field";
	}
		print_r(json_encode($data));

?>