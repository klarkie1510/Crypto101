<?php


	function get_user_info($user_id)	{
		$user_info = array();
		$user_id = (int)$user_id;
		
		$num_elements = func_num_args();
		$elements = func_get_args();
	
		if($num_elements > 1) {
			unset($elements[0]);
			$fields = "`" . implode("`, `", $elements) . "`";
			$user_information = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		}
		
		return $user_information;
	}
	
	function register_user($registering_details) {
		
		array_walk($registering_details, 'array_sanitize');
		
		$fields = "`" . implode("`, `", array_keys($registering_details)) . "`";
		$values = "'" . implode("', '", $registering_details) . "'";
		mysql_query("INSERT INTO `users` ($fields) VALUES ($values)");
	}
	
	function user_logged_in() {
		if(isset($_SESSION['user_id'])) {
			return true;
		} else {
			return false; 
		}
	}
	function existing_user($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function existing_email($email) {
		$email = sanitize($email);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	
	function get_user_id($username) {
		$username = sanitize($username);
		
		$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");
		
		return mysql_result($query, 0, 'user_id');	
	}

	
	function login_user($username, $password) {
		
		$user_id = get_user_id($username);
		
		$username = sanitize($username);
		
		
		$query =  mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
		
	    $result = mysql_result($query, 0);
		
		if(mysql_result($query, 0) == 1) {
			return $user_id;
		} else {
			return false;
		}
		
		
		
		
	}
	
?>