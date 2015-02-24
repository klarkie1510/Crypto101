<?php

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

		/*if(mysql_result($query, 0) == 1) {
			return true;
		} else {
			return false;
		}*/
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