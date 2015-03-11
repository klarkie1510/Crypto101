<?php

	//get the users information from the user id.
	function get_user_info($user_id)	{
		$user_info = array();
		$user_id = (int)$user_id;
		
		//Counts the number of elements. Methods can be passed more elements than in there signature.
		$num_elements = func_num_args();
        //get said elements.
		$elements = func_get_args();
	
		if($num_elements > 1) {
			unset($elements[0]);
			//used to make a sql query to get the selected fields from the database
			$fields = "`" . implode("`, `", $elements) . "`";
			$user_information = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		}
		//return it
		return $user_information;
	}
	
	function register_user($registering_details) {
		
		//Sanitize the array elements to prevent sql injections
		array_walk($registering_details, 'array_sanitize');
		
		//create a sql query by making fields and values.
		$fields = "`" . implode("`, `", array_keys($registering_details)) . "`";
		$values = "'" . implode("', '", $registering_details) . "'";
		mysql_query("INSERT INTO `users` ($fields) VALUES ($values)");
	}
	
	//check if a user is logged in by checking is session superglobal variable is set
	function user_logged_in() {
		if(isset($_SESSION['user_id'])) {
			return true;
		} else {
			return false; 
		}
	}
	//check to see if a user of that username already exists in database return 1 is true
	function existing_user($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	//get a user id based on username
	function get_user_id($username) {
		$username = sanitize($username);
		
		$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");
		
		return mysql_result($query, 0, 'user_id');	
	}

	//login user
	function login_user($username, $password) {
		
		$user_id = get_user_id($username);
		
		$username = sanitize($username);
		
		//check to see if there username and password are in the database corresponding to the same row
		$query =  mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
		
	    $result = mysql_result($query, 0);
		
		//if they are return the user_id
		if(mysql_result($query, 0) == 1) {
			return $user_id;
		} else {
			return false;
		}
		
		
		
		
	}
	
?>