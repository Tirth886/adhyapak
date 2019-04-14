<?php 
	session_start();
	if(@$_SESSION['ustatus']==true){

			unset($_SESSION['ustatus']);
			unset($_SESSION['uname']);
			unset($_SESSION['uemail']);
			unset($_SESSION['uphone']);

			header("location: ../../");
	}else{}

?>