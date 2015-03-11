<?php
include 'core_func/init.php';
include 'includes/siteheader.php';
?>
	<div class = "cipher-info">
		<header>
			<h2>Vigenere cipher: introduction</h2>
			<hr>
		</header>
			<content>
				<p> It is a polyalphabetic cipher because it uses two or more cipher alphabets to encrypt
				the data. In other words, the letters in the Vigenere cipher are shifted by different amounts,
				normally done using a word or phrase as the encryption key .

				Unlike the monoalphabetic ciphers, polyalphabetic ciphers are not susceptible to frequency analysis, 
				as more than one letter in the plaintext can be represented by a single letter in the encryption.</p>
				
				<p>Vignere cipher uses a vignere table (a table showing all 26 states of a shifted alphabet). We use this
				table and a key in order to encrypt.  If we were to encode a message using ta key, we write it as many times
				as necessary above our message. To find the encryption, we take the letter from the intersection of the Key letter row, 
				and the Plaintext letter column.</p>
			</content>
		
	</div>
	<div class = "cipher-tool">
		<header>
			<h2>Vigenere cipher tool</h2>
			<p><strong>Step 1: </strong>Enter a keyword and press Build table to build a vigenere table for it.</p>
			<p><strong>Step 2: </strong>Enter your plaintext in the 'Plaintext' text area and click 'Encode' button to encode the text!</p>
			<p><strong>Step 3: </strong>To use a different vigenere table, click 'Clear' and then repeat from step 1!</p>
			<hr>
			<br>
		</header>
		<center>
			<div id = "vigenere-table">
			</div>
			<label for = "keyword" id = "label"> Keyword </label>
			<input type = "text", id = "keyword", style="text-transform:uppercase"> <br>
			<button id = "build">Build Table</button>
			<button id = "clear">Clear Table</button><br>
			<h3 id="errors"></h3><br>
			
			<textarea rows = "12" cols="40" id = "plaintext" name="plaintext" >Plaintext: Please enter some text</textarea>
			<textarea rows = "12" cols="40" id = "ciphertext" name="ciphertext" readonly>Ciphertext: output </textarea>
		
			<input type = "button", id = "Encode", name = "Encode", value = "Encode" class = "caesar-app">
		</center>
			
		

	</div>
	<script type = 'text/javascript' src='js/vigenere.js'></script>
<?php
include 'includes/sitefooter.php';
?>