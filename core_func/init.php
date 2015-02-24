<?php
//Starts a session
session_start();
error_reporting(0);

require 'db_func/connect.php';
require 'func/std_functions.php';
require 'func/user_functions.php';

//Used to store the errors that happen throughout the page it is on. 
$errors = array();
?>