<?php

	// print_r("hello");
	
	include_once("../connection.php");

	$select = "SELECT user.name,user.email,sie.ie FROM `sie` JOIN `user` WHERE sie.user = user.id";
	$exe	= $con->query($select);
	// print_r($exe);
	if($exe->num_rows > 0){

		while ($data = $exe->fetch_object()) {

			$user = $data->name;
			$email= $data->email;
			$ie   = $data->ie;

			$mydata[] = array(

				"name_email" => $user."<label class = 'coloremail'>&nbsp;|&nbsp;".$email."</label>",
				"ie"   => $ie
			);
		}
		// print_r($mydata);
		$mydata = @$mydata;
		$response = "sucess";
		$message = "Fetch Sucessfully";
	}
	else{

		$mydata = array();
		$response = "failure";
		$message = "No Experience's yet ..!";	
	}

	$result['data'] = $mydata;
	$result['response'] = $response;
	$result['message'] = $message;

	print_r(json_encode($result));

?>