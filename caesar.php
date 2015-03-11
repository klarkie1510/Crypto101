<?php
include 'core_func/init.php';
include 'includes/siteheader.php';
?>
	<div class = "cipher-info">
		<header>
			<h2>Caesar cipher: introduction</h2>
			<hr>
		</header>
			<content>
				<p>The Caesar cipher (also known as the 'shift cipher') is one of the simplest and widely known
				cryptographic encryption techniques. The method is named after Julius Caesar, who used it to protect
				messages during wars.</p>
				
				<p>Caesar cipher is an example of a substitution cipher - units of plaintext are replaced with units of ciphertext,
				which are a fixed position down the alphabet. The cipher requires a shift value (key), which is the number of positions down
				the alphabet which the units are replaced. For example, a left shift of 5 would mean that 'D' is replaced by 'G', 'E' is 
				replaced by 'H' etc.</p>
			</content>
		
	</div>
	<div class = "cipher-tool">
		<header>
			<h2>Caesar cipher tool</h2>
			<p><strong>Step 1: </strong>Use the 'Left Shift' and 'Right Shift' keys to select a key (shown in the 'shift value' box).</p>
			<p><strong>Step 2: </strong>Type some text into the 'Plaintext' text area, and press the 'Encode' button to start encoding! </p>
			<p><strong>Step 3: </strong>Use the 'Decode' button to decode any text in the 'Ciphertext' text area.</p>
			<hr>
		</header>
		<?php include 'includes/caesar-table.php' ?>
		<textarea rows = "12" cols="40" id = "plaintext" name="plaintext" form="caesar">Plaintext: Please enter some text</textarea>
		<textarea rows = "12" cols="40" id = "ciphertext" name="ciphertext" form = "caesar">Ciphertext: output </textarea>
		<form action = "caesar.php" id = "caesar">
			<ul>
				<li>
					Shift value (left shift, if encoding):<br>
					<input type = "text" id = "shift_value" value = 0 name = "shift_value" readonly>
				</li>
				<li>
					<input type = "button", id = "Encode", name = "Encode", value = "Encode" class = "caesar-app">
					<input type = "button", id = "Decode", name = "Decode", value = "Decode" class = "caesar-app">
				</li>
			</ul>
		</form>
	</div>
	<script type = 'text/javascript' src='js/caesar.js'></script>
<?php
include 'includes/sitefooter.php';
?>