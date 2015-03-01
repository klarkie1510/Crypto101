<?php
include 'core_func/init.php';
include 'includes/siteheader.php';

if(empty($_POST) === false) {
	//the name of the required fields.
	$mandatory_fields = array('username', 'password', 'repeat_password', 'first_name', 'last_name', 'email');
	
	//if the required fields are empty, error.
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $mandatory_fields) === true) {
			$errors[] = "Asterisked fields are required" ;
			break 1;
		}			
	}
	
	if(empty($errors) === true) {
		if(existing_user($_POST['username']) === true) {
			$errors[] = "Username already exists.";
		}
		if(strlen($_POST['username']) < 5 || strlen($_POST['username']) > 15) {
			$errors[] = "Username must be between 5 and 15 characters.";
		}
		if(!preg_match('/^[\w\-]+$/', $_POST['username'])) {
			$errors[] = "Username can only contain alphanumeric characters, hyphens and underscores";
		}
		if(strlen($_POST['password']) < 6 || strlen($_POST['password'] > 30)) {
			$errors[] = "Password must be between 6 and 30 characters.";
		}
		if($_POST['password'] !== $_POST['repeat_password']) {
			$errors[] = "Passwords do not match.";
		}
		if(!preg_match('/^[A-z]+$/', $_POST['first_name'])) {
			$errors[] = "First name can only contain letters";
		}
		if(!preg_match('/^[A-z]+$/', $_POST['last_name'])) {
			$errors[] = "Last name can only contain letters";
		}
		if(existing_email($_POST['email']) === true) {
			$errors[] = "Email already in use.";
		}
	}
}

 ?>

		<div class = "main">
			<div class = "register">
				<h2>Register!</h2>
					<form action = "" method = "POST">
					<ul>
						<li>
							*Username:<br>
							<input type="text" name="username">
						</li>
						<li>
							*Password:<br>
							<input type="password" name="password">
						</li>
						<li>
							*Repeat Password:<br>
							<input type="password" name="repeat_password">
						</li>
						<li>
							*First name:<br>
							<input type="text" name="first_name">
						</li>
						<li>
							*Last name:<br>
							<input type="text" name="last_name">
						</li>
						<li>
							*Email:<br>
							<input type="text" name="email">
						</li>
						<li>
							<input type="submit" name="Submit">
						</li>
					</ul>
					</form>
					
					<p> * indicates required fields </p>
					
					<?php if(empty($_POST) === false && empty($errors) === true) {
						$register_data = array (
						'username' => $_POST['username'],
						'password' => $_POST['password'],
						'salt' => 'abcdefghijklmnopqrstuvwxyz',
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'email' => $_POST['email'],
						'points' => 0,
						'level_id' => 1);
						
						register_user($register_data);
						header('Location: index.php');
						exit();
					} else {
						echo display_errors($errors);
					}
					?>
						
			
			</div>
		</div>
<?php include 'includes/sitefooter.php' ?>