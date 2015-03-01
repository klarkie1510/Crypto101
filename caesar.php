<?php
include 'core_func/init.php';
include 'includes/siteheader.php';
$output = "Output text";
if(isset($_POST) && empty($_POST) === false) {
	$plaintext = $_POST['plaintext'];
	$shift_value = $_POST['shift_value'];
	$ciphertext = $plaintext;
	
	for($i = 0; $i<strlen($plaintext); $i++) {
		if(!preg_match('/^[A-z]+$/', $plaintext[$i])) {
			$ciphertext[$i] = $plaintext[$i];
		} else {
			$ascii_value = ord($plaintext[$i]);
			for($j = 0; $j < $shift_value; $j++) {
				if($ascii_value == 90) { 
					$ascii_value = 65;
				} else if($ascii_value == 122) {
					$ascii_value = 97;
				} else {
					$ascii_value++;
				}
			}
			$ciphertext[$i] = chr($ascii_value);
		}
		$output = $ciphertext;
	}
}
?>
	<div class = "cipher-info">
		<header>
			<h2>Caesar cipher</h2>
		</header>
			<content>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Aenean eget ante quis tortor cursus tincidunt.
				Curabitur eget tortor vitae ligula commodo tempor et in tortor.
				Pellentesque luctus et dolor a fermentum.
				Maecenas id magna elementum, ultricies tortor eget, dapibus nunc.
				Mauris nulla erat, lobortis sedmaximus id, interdum quis lacus. 
				Nunc aliquam congue lorem id ultricies. 
				Fusce tempor finibus ante, eget dictum lacus tempus id.
				Suspendisse mollis nulla sit amet ipsum fringilla, at iaculis massa varius. 
				Etiam sollicitudin enim quis convallis lobortis.</p>
			</content>
		
	</div>
	<div class = "cipher-tool">
		Plaintext:<br>
		<textarea rows = "12" cols="40" name="plaintext" form="caesar">Enter your plaintext here.. </textarea>
		<form action = "caesar.php" method = "post" id = "caesar">
			<ul>
				<li>
					Shift value (right shift):<br>
					<input type = "text", name = "shift_value">
				</li>
				<li>
					<input type = "submit", value = "Encode">
				</li>
			</ul>
		</form>
		Ciphertext:<br>
		<textarea rows = "12" cols="40" name="ciphertext"><?php echo htmlspecialchars($output);?> </textarea>
	</div>
<?php
include 'includes/sitefooter.php';
?>