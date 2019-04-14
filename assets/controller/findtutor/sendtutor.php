<?php 
	// echo "Hello";
	include_once("../connection.php");
	session_start();

	$tutorid    = $_POST['tutorid'];
	$tutoremail = trim($_POST['temail']);
	$msgfrtutor = trim($_POST['message']);
	$user  = $_SESSION['uname'];
	$email = $_SESSION['uemail'];
	$phone = $_SESSION['uphone'];
	$uid   = $_SESSION['uid'];


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
	$mail->addAddress(@$tutoremail);     // Add a recipient
	$mail->addReplyTo(@$email);
	$mail->isHTML(true);                                 // Set email format to HTML
	$mail->Subject = $user."Want you tutor..!";
	$mail->Body    = "<table border='1' width='500px' cellpadding='20'>
							<tr>
								<th colspan='3' style='background-color: gray; font-size: 10px;'>Student Infor</th>
							</tr>
							<tr>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Name</b></th>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Email</b></th>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Phone</b></th>
							</tr>
							<tr>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$user."</b></td>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$email."</b></td>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$phone."</b></td>
							</tr>
							<tr>
								<th colspan='3' style='border-style: dashed; background-color:rgb(228, 237, 166);'>About User</th>
							</tr>
							<tr>
								<td colspan='3' style='border-style: dashed; background-color:rgb(228, 237, 166);width:100%;'>".@$msgfrtutor."</td>
							</tr>
						</table>";
	$mail->AltBody = "User : ".$user."Want you as tutor ?"."Email : ".$email."&nbsp;Phone : ".$phone;
	// echo "<pre>";print_r($mail); exit;
	// if(!$mail->send()) {
	// 	$data['status'] = "check";
	//     $data['failure'] = 'Check your internet connection!';
	//     // echo 'Mailer Error: ' . $mail->ErrorInfo;
	// }else{
	// 	// !$mail->send();
		

	// }
	$selectuser = "SELECT `sender`,`receiver` FROM `tutor_request` WHERE `sender` = '$uid' AND `receiver` = '$tutorid'";
		$exeuser   = $con->query($selectuser);
		$fetchuser = $exeuser->fetch_object();
		if(@$fetchuser->sender == $uid && @$fetchuser->receiver == $tutorid){
			$data['status'] = "failure";
			$data['already'] = "Already Request";	
		}else{
			$mail->send();
			$sendquery = "INSERT INTO `tutor_request` (`sender`,`receiver`,`text`) VALUES ('$uid','$tutorid','$msgfrtutor')";
			$exe = $con->query($sendquery);
			if($exe){
				$data['status'] = "sucess";
				$data['sendsuc'] = "Your Request Send";
			}else{
				$data['status'] = "fail";
				$data['sendfail'] = "Check Internet !";
			}
		}


	print_r(json_encode($data));
?>