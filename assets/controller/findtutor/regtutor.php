<?php 
// print_r(json_encode("hell"));
session_start();
include_once("../connection.php");

	$fname	 = @trim(ucfirst(strtolower($_POST['fname'])));
	$lname	 = @trim(ucfirst(strtolower($_POST['lname'])));
	$email	 = @trim(strtolower($_POST['email']));
	$phone	 = @trim($_POST['phone']);
	$sub  	 = @trim(strtolower($_POST['sub']));
	$address = @trim(strtolower($_POST['address']));
	$gender  = @trim($_POST['gender']);
	$fee     = @trim($_POST['fee']);
	$profile = @trim($_POST['imagename']);


	if($email && $phone){
		$emailphone 	= "SELECT `email`,`phone` FROM tutor WHERE `email` = '$email' OR `phone` = '$phone'";
		$exeemailphone	= $con->query($emailphone);
		$fetch	= $exeemailphone->fetch_object();
		if(@$fetch->email === $email || @$fetch->phone === $phone){
			if($fetch->email === $email){
				$data['emailerror'] = "email already exist";
			}else{}
			if($fetch->phone === $phone){
				$data['phoneerror'] = "Number exist";
			}else{}			
		}else{
			if(@isset($_POST['chk'])){
				$inserttutor = "INSERT INTO `tutor` (`firstname`,`lastname`,`email`,`phone`,`subject`,`address`,`gender`,`fees`,`profile`) VALUES ('$fname','$lname','$email','$phone','$sub','$address','$gender','$fee','$profile')";
				$exe = $con->query($inserttutor);
				$id = $con->insert_id;
				// print_r($id);
				if($exe && $id){
					$selectun = "SELECT * FROM `tutor` WHERE `id` = '$id'";
					$exeun	  = $con->query($selectun);
					$fetchun  = $exeun->fetch_object();
					// print_r(json_encode($fetchun));
					if(@$fetchun->firstname == "Undefined" || @$fetchun->lastname == "Undefined" || @$fetchun->email == "undefined" || @$fetchun->phone == "undefined" || @$fetchun->subject == "undefined" || @$fetchun->address == "undefined" ||@$fetchun->gender == "undefined" || @$fetchun->fee == "undefined"){
						$deleteun = "DELETE FROM `tutor` WHERE `id` = '$id'";
						$exeun	  = $con->query($deleteun);
						if($exeun){
							if(@$fetchun->firstname == "Undefined"){$data['ferror'] = "Required";}else{}
							if(@$fetchun->lastname == "Undefined"){$data['lerror'] = "Required";}else{}
							if(@$fetchun->email == "undefined"){$data['eerror'] = "Required";}else{}
							if(@$fetchun->phone == "undefined"){$data['perror'] = "Required";}else{}
							if(@$fetchun->subject == "undefined"){$data['serror'] = "Required";}else{}
							if(@$fetchun->address == "undefined"){$data['aerror'] = "Required";}else{}
							if(@$fetchun->gender == "undefined"){$data['gerror'] = "Required";}else{}
							if(@$fetchun->fee == "undefined"){$data['feerror']= "Required";}else{}
						}else{}
					}else{
						$data['status_sucess'] = "Registation Sucessfully";	
						if($data['status_sucess']){
							$selecttutor = "SELECT `email` FROM `tutor` WHERE `id` = '$id'";
							$exetutor	 = $con->query($selecttutor);
							$fetchtutor  = $exetutor->fetch_object();
							if(@count($fetchtutor) == 1){
								require '../forgetpassword/sendmail/PHPMailerAutoload.php';
								require '../forgetpassword/sendmail/crendtial.php';
								$mail = new PHPMailer;
								// $mail->SMTPDebug = 4;                               // Enable verbose debug output
									
								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = EMAIL;                 // SMTP username
								$mail->Password = PASS;                           // SMTP password
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                                    // TCP port to connect to

								$mail->setFrom(EMAIL, 'Adhyapak');
								$mail->addAddress(@$fetchtutor->email);     // Add a recipient
								$mail->addReplyTo(EMAIL);
								$mail->isHTML(true);                                 // Set email format to HTML
								$mail->Subject = "Registration Sucessfully";
								$mail->Body    = "<table border='0' width='100%' cellpadding='20'>
													<tr>
														<th style='border-style: dashed; background-color:#F4476B;'><b>Sucessfully Registered</b></th>
													</tr>
													<tr>
														<td style='border-style: dashed; background-color:#F7F9FC;'><b>Thank You For Taking Participate !</b></td>
													</tr>
												</table>";
								$mail->AltBody = "Thank You For Taking Interest";
								// echo "<pre>";print_r($mail); exit;
								if(!$mail->send()) {
								    $data['failure'] = '<i class="fa fa-thumbs-down" style="font-size:20px;"></i>  Check your internet connection!';
								    // echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
									$sendquery = "INSERT INTO `mail_history` (`recipient`,`reason`) VALUES ('$id','RTS')";
									$con->query($sendquery);
								}
							}else{}
							}else{}
						}
					}
			}else{
				// checkbox error
				$data['cerror'] = "<sup>*</sup>";
			}
		}
	}

	print_r(json_encode($data));
?>