<?php 
	// print_r(json_encode("hello"));
	
	$filename = $_FILES['file']['name'];

	$location = "../../img/";

	$arrayfilename = explode(".",$filename);

	$fileextention = end($arrayfilename);

	if(strtoupper($fileextention) == "JPG"){

		$movefile = move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
		if($movefile){
			$status = array(
				"status"    => "sucess",
				"imagename" => $filename
			);
		}else{
			$status = array(
				"status"     => "failure",
				"imageerror" => "<sup>*</sup>"
			);
		}
		
	}else{
		$status = array(
			"status" => "failure",
			"imageerror"  => "JPG<sup>*</sup>"
		);
	}
	print_r(json_encode($status));

?>