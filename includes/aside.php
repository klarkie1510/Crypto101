		<aside class = "member-details">
		  <?php
		    if(user_logged_in() === false) {
				include 'loginform.php';
			} else {
		    ?> <h2>Hello <?php echo $user_info['first_name']; ?> !</h2>
			<a href = "logout.php">Logout?</a>
			<?php
			}
			?>
		</aside>