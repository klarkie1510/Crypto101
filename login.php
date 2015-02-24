<?php
include 'core_func/init.php';
include 'includes/siteheader.php';

  if(empty($_POST) === false) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
  }
  
  if(empty($username) === true || empty($password) === true) {
	$errors[] = 'Username and password field is required.';
  } else if (existing_user($username) === false) {
	$errors[] = 'Username does not exist!';
  } else {
	  
	  $login = login_user($username, $password);
	  
	  if($login === false) {
		  $errors[] = 'Username and/or password is incorrect';
	  } else {
		  $_SESSION['user_id'] = $login;
		  header('Location: index.php');
		  exit();
	  }
	  
	  
  }
  
  print_r($errors);
  include 'includes/sitefooter.php'

?>