<?php 
	// Generating Unique Code Function
	function generate_unique_code($length){
		
		$string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		// print_r(strlen($string));exit();
		$str_length = strlen($string) - 1;
		$uniqe_code = '';
		
		for ($i=0; $i < $length; $i++) {
			$uniqe_code = $uniqe_code.$string[mt_rand(0,$str_length)];
		}
			return $uniqe_code;
	}
?>