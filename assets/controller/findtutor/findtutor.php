<?php 
	// print_r(json_encode("hello"));

	session_start();
	include_once("../connection.php");

	// print_r($con);
	$selecttutor = "SELECT * FROM `tutor`";
	$exetutor = $con->query($selecttutor);
	if($exetutor->num_rows > 0){
		while ($fetchtutor = $exetutor->fetch_object()) {
			# code...
			$id 	 = $fetchtutor->id;
			$name  	 = " ".$fetchtutor->firstname." ".$fetchtutor->lastname;
			$email 	 = " ".$fetchtutor->email;
			$phone 	 = "&nbsp;&nbsp;".$fetchtutor->phone;
			$profile = $fetchtutor->profile; 
			$address = "&nbsp;&nbsp;".$fetchtutor->address;
			$subject = "&nbsp;&nbsp;".$fetchtutor->subject;
			$fee     = "&nbsp;&nbsp;".$fetchtutor->fees;

			$mydata[] = array(
				"id"	  => $id,
				"name" 	  => $name,
				"email"	  => $email,
				"phone"   => $phone,
				"profile" => $profile,
				"address" => $address,
				"subject" => $subject,
				"fee"	  => $fee
			);

			$mydata   = @$mydata;
			$response = "sucess";
			$message  = "Recorde Fetch Sucessfully";
		}
	}else{
			$mydata   = array();
			$response = "Failure";
			$message  = "No Tutor available !";
	}

	$result['mydata'] 	= $mydata;
	$result['response'] = $response;
	$result['message']  = $message;

	print_r(json_encode($result));
?>