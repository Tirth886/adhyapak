<?php 

	include_once("../connection.php");

	$question = @trim(strtolower(ucfirst($_POST['questions'])));

	if(!empty($question)){

		$select_sme_qus = "SELECT `questions` FROM `allquestions` WHERE `questions`='$question'";
		$exe_sme_qus    = $con->query($select_sme_qus);
		$fetch_object   = $exe_sme_qus->fetch_object();

		if(@$fetch_object->questions === $question){
			$data['question_sme1'] = "Question already asked";
			print_r(json_encode($data));
		}else{}

	}else{
		$data['ques_err'] = "required Field";
		print_r(json_encode($data));
		
	}

?>