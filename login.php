<?php
include 'core_func/init.php';
include 'includes/siteheader.php';
//check is the post array is not empty 
if(empty($_POST) === false) {
	//get username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
 
  //if one field is empty, throw an error
  if(empty($username) === true || empty($password) === true) {
	$errors[] = 'Username and password field is required.';
  } else if (existing_user($username) === false) { //if user doesnt exist throw an error
	$errors[] = 'Username does not exist!';
  } else {
	  
	  $login = login_user($username, $password); //retrieves the user id count.
	  
	  //if the count = 0 == false, one of the fields is wrong
	  if($login === false) {
		  $errors[] = 'Username and/or password is incorrect';
	  } else { //Log the user in create a session. 
		  $_SESSION['user_id'] = $login;
		  header('Location: index.php');
		  exit();
	  }
	  
	  
  }
} else {
	//prevents landing on the page
	header('Location: index.php');
}
  //if there are errors display them
  if(empty($errors) === false) {
	echo display_errors($errors);
  }
  include 'includes/sitefooter.php'

?>