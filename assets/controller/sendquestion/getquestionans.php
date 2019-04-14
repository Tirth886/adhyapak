<?php 
	// print_r(json_encode("gelo"))

	session_start();
	include_once("../connection.php");

	$select_qusans  = "SELECT user.name, user.email,allquestions.questions,allquestions.date,allquestions.code FROM `allquestions` JOIN `user` WHERE allquestions.uid = user.id ORDER BY `date` DESC";

	$exe_total      = $con->query($select_qusans);

	if($exe_total->num_rows > 0){
		while ($data_qs = $exe_total->fetch_object()) {

			$date = new dateTime($data_qs->date);
			$date = date_format($date,"M j, Y | H:i:s");
			$user = $data_qs->name;
			$email= $data_qs->email; 
			$question = $data_qs->questions;
			$par_code = $data_qs->code;
			// print_r($par_code."<br>");

			$mydata[] = array(
				'par_code' => $par_code, 
				'user'     => $user.'<small class = "setting2">&nbsp;&nbsp;&nbsp;|'.$email.'|&nbsp;&nbsp;&nbsp;</small>',
				// 'email'    => '&nbsp;&nbsp;&nbsp;|'.$email.'|&nbsp;&nbsp;&nbsp;',
				'date'     => $date,
				'question' => $question
			);
			
			// fetching all replies

			$select_replies1 = "SELECT user.name,user.email,allreplies.code,allreplies.answers,allreplies.date FROM allreplies JOIN user WHERE allreplies.code = '$par_code' AND allreplies.rid = user.id ORDER by `date` DESC";

			$exe_replies 	 = $con->query($select_replies1);
			// $exe_rows 		 = $exe_replies->num_rows;
			// if($exe_rows == 0){
			// }else{

			// 	$datarows = array(
			// 		'numrows' => "&nbsp;&nbsp;(".$exe_rows.")&nbsp;&nbsp;", 
			// 	);
			// print_r($datarows);

				while ($data_re = $exe_replies->fetch_object()) {
					$redate 	= new dateTime($data_re->date);
					$redate 	= date_format($redate , "M j, Y | H:i:s");
					$reuse  	= $data_re->name;
					$reemail	= $data_re->email;
					$reans  	= $data_re->answers;
					$recodepar 	= $data_re->code;			

					$mydataans[] = array(
					
						'name'	   => $reuse,
						'email'	   => '&nbsp;&nbsp;&nbsp;|'.$reemail.'|&nbsp;&nbsp;&nbsp;',
						'date'     => $redate,
						'answers'  => $reans,
						'recodepar'=> $recodepar 
						
					);
				
				}
			// }			
					
			// }
			// echo "<pre>";
			// print_r($mydata);
			// $datarows  = @$datarows;
 			$mydataans = @$mydataans;
			$mydata    = @$mydata;
			$response  = "success";
			$message   = "record fetch successfully";

		}
	}else{
			// $datarows = array();
			$mydataans= array();
			$mydata   = array();
			$response = "failure";
			$message  = "No Disqustion's yet . . . !!";		
	}
	// $result['datarows']= $datarows;
	$result['dataans'] = $mydataans;
	$result['data']    = @$mydata;
	$result['result']  = $response;
	$result['message'] = $message;
	
	print_r(json_encode($result));

	
?>