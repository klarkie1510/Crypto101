<?php
//Starts a session
session_start();
error_reporting();

require 'db_func/connect.php';
require 'func/std_functions.php';
require 'func/user_functions.php';


if(user_logged_in() == true) {
	$user_session_id = $_SESSION['user_id'];
	$user_info = get_user_info($user_session_id, 'user_id', 'username', 'first_name', 'last_name');
	
}
//Used to store the errors that happen throughout the page it is on. 
$errors = array();
?>