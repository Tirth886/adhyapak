<?php 
	
include_once("../connection.php");
	
$email = @trim(strtolower($_POST['email']));
$phone = @trim($_POST['phone']);
if($email && $phone){
	$check_user = "SELECT id,email,password,phone FROM user WHERE email='$email' AND phone='$phone'";
	$exe_check_user = $con->query($check_user);
	$fetch_rec      = $exe_check_user->fetch_object();
	if(@count($fetch_rec) == 1){
		// $data['data_true'] = "hi";
		require 'sendmail/PHPMailerAutoload.php';
		require 'sendmail/crendtial.php';
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
		$mail->addAddress(@$fetch_rec->email);     // Add a recipient
		$mail->addReplyTo(EMAIL);
		$mail->isHTML(true);                                 // Set email format to HTML
		$mail->Subject = "Email and Password";
		$mail->Body    = "<table border='1' width='500px' cellpadding='20'>
							<tr>
								<th colspan='3' style='background-color: gray; font-size: 10px;'>User Information</th>
							</tr>
							<tr>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Email</b></th>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Phone</b></th>
								<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Password</b></th>
							</tr>
							<tr>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->email."</b></td>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->phone."</b></td>
								<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->password."</b></td>
							</tr>
						</table>";
		$mail->AltBody = "Email = ".$fetch_rec->email."<br>"."Phone = ".$fetch_rec->phone."<br>"."Password =".$fetch_rec->password;
		// echo "<pre>";print_r($mail); exit;
		if(!$mail->send()) {
		    $data['failure'] = '<i class="fa fa-thumbs-down" style="font-size:20px;"></i>  Check your internet connection!';
		    // echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$id = $fetch_rec->id;
			$sendquery = "INSERT INTO `mail_history` (`recipient`,`reason`) VALUES ('$id','FP')";
			$con->query($sendquery);
		    $data['sucess']  = '<i class="fa fa-thumbs-up" style="font-size:20px;"></i>  Check Inbox !';
		}
	}else{
		$data['invalidinputemail'] = "Following Entry Not Match";
	}
}else{}
print_r(json_encode($data));
?>