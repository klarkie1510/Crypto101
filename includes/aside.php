		<aside class = "member-details">
		  <?php
		    if(user_logged_in() === false) {
				include 'loginform.php';
			} else
				echo "hey";
		  ?>
		</aside>