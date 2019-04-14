<?php 
	
	include_once("connection.php");
	// print_r($con);
	$name  	  		 = @trim(ucfirst(strtolower($_POST['name'])));
	$email    		 = @trim(strtolower($_POST['email']));
	$phone    		 = @trim($_POST['phone']);
	$password 		 = @$_POST['password']; 
	$password_repeat = @$_POST['password_repeat'];
	$gender			 = @rtrim($_POST['gender']);	
	

	if($email){
		$select_same_user = "SELECT email FROM user WHERE email='$email' OR `phone` = '$phone'";
		$exe_same_user 	  = $con->query($select_same_user);
		$fetch_same_user  = $exe_same_user->fetch_object();
		if(@$fetch_same_user->email == $email || @$fetch_same_user->phone == $phone){
			if(@$fetch_same_user->email == $email){
				$data['emailerror2'] = "email already exist";
			}else{}
			if(@$fetch_same_user->phone == $phone){
				$data['phoneerror2'] = "number already exist";
			}else{}
		}
		else if ($password_repeat!==$password) {
			$data['chfre'] = "password must match";
		}	
		else
		{
			$insert_query = "INSERT INTO user (name,email,phone,password,gender) VALUES ('$name','$email','$phone','$password','$gender')";
			$exe = $con->query($insert_query);
			$id  = $con->insert_id;

			
			if($exe && $id){
					$selectun = "SELECT * FROM `user` WHERE `id` = '$id'";
					$exeun	  = $con->query($selectun);
					$fetchun  = $exeun->fetch_object();
					// print_r(json_encode($fetchun));
					if(@$fetchun->name == "Undefined" || @$fetchun->email == "undefined" || @$fetchun->phone == "undefined" || @$fetchun->password == "undefined" || @$fetchun->gender == "undefined"){
						$deleteun = "DELETE FROM `user` WHERE `id` = '$id'";
						$exeun	  = $con->query($deleteun);
						if($exeun){
							if(@$fetchun->name == "Undefined"){$data['ferror'] = "Required";}else{}
							if(@$fetchun->email == "undefined"){$data['eerror'] = "Required";}else{}
							if(@$fetchun->phone == "undefined"){$data['perror'] = "Required";}else{}
							if(@$fetchun->password == "undefined"){$data['paerror'] = "Required";}else{}
							if(@$fetchun->gender == "undefined"){$data['gerror'] = "Required";}else{}
						}else{}
					}else{
						// if($data['sucess']){
							$selecttutor = "SELECT `email` FROM `user` WHERE `id` = '$id'";
							$exetutor	 = $con->query($selecttutor);
							$fetchtutor  = $exetutor->fetch_object();
							if(@count($fetchtutor) == 1){
								require 'forgetpassword/sendmail/PHPMailerAutoload.php';
								require 'forgetpassword/sendmail/crendtial.php';
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
														<th colspan = '2' style='border-style: dashed; background-color:#F4476B;'><b>Sucessfully Registered</b></th>
													</tr>
													<tr>
														<th style='border-style: dashed; background-color:#F4476B;'><b>Email</b></th>
														<th style='border-style: dashed; background-color:#F4476B;'><b>Password</b></th>
													</tr>
													<tr>
														<td style='border-style: dashed; background-color:#F7F9FC;'><b>".@$fetchtutor->email."</b></td>
														<td style='border-style: dashed; background-color:#F7F9FC;'><b>".@$password."</b></td>
													</tr>
												</table>";
								$mail->AltBody = "Thank You Registering";
								// echo "<pre>";print_r($mail); exit;
								if(!$mail->send()) {
								    $data['failure'] = '<i class="fa fa-thumbs-down" style="font-size:20px;"></i>  Check your internet connection!';
								    // echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
									$sendquery = "INSERT INTO `mail_history` (`recipient`,`reason`) VALUES ('$id','RU')";
									$con->query($sendquery);
									$data['sucess'] = "Registation Sucessfully";	
								}
							}else{}
							// }else{}
						}
					}
		}
	}	

print_r(json_encode($data));	
?>