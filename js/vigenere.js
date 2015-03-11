$(function() {
	$('#build').click(function() {
		var keyword = $('#keyword').val().toUpperCase(); //Make sure it uppercase to make my life easy.
		if(keyword.match(/^[a-zA-Z]+$/)) {
			$('#vigenere-table').append("<table id = \"vigenere-grid\">"); //Make table in div
			$('#vigenere-grid').append("<tbody><tr id = \"head\"></tr></tbody>"); //Give table head row
			
			var str = "A";
			str = str.charCodeAt(0);
			while(str != 91) {
				str = String.fromCharCode(str);
				$('#vigenere-grid tbody tr:last').append("<td>" + str + "</td>"); //Add alphabet to head row
				str = str.charCodeAt(0);
				str = str + 1;
			}
			var keyword = $('#keyword').val().toUpperCase();  //GET keyword in uppercase
			for(var i = 0; i < keyword.length; i++) {
				$('#vigenere-grid tbody tr:last').after("<tr class = \"body\" id = " + (i + 1) +"></tr>"); //make rows for length of keyword, label number
				var str = keyword.charAt(i);
				str = str.charCodeAt(0);
				var end = "A"; //Used for positioning of the caesars.
				end = end.charCodeAt(0);
				while(end != 91) {
					if(str == 91) {
						str = 65;
					} else {
						str = String.fromCharCode(str);
						end = String.fromCharCode(end);
						$('#vigenere-grid tbody tr:last').append("<td id = " + end + ">" + str + "</td>"); //Make the caesar alphabets in the new rows
						str = str.charCodeAt(0);
						end = end.charCodeAt(0);
						str = str + 1;
						end = end + 1;
					}
				}
			}
			
			$('#build').hide(); //hide the build button
			$('#errors').html(""); //hide any errors, it ran correctly.
			$('#label').html("Keyword: <strong>" + $('#keyword').val().toUpperCase() + "</strong>");
			$('#keyword').hide();
		} else {
			$('#errors').html("Keyword must be alphabetic characters."); //Prevent people from entering nothing or non-alphabet
		}
	});
	
	$('#clear').click(function() {
		$('#vigenere-grid').remove(); //remove the vigenere table
		$('#build').show();
		$('#keyword').show();
		$('#label').html("Keyword:");
	});
	
});

$(function() {
	$('#Encode').click(function() {
		if($('#vigenere-grid').length) {
			var plaintext = $('#plaintext').val().toUpperCase();
			var ciphertext = $('#plaintext').val().toUpperCase();
			var keyindex = 1;
			for(var i = 0; i < plaintext.length; i++) {
				var chara = plaintext.charAt(i);
				if(!chara.match(/[A-z]/i)) { //If non-alphabetic pass to ciphertext
					if(i != plaintext.length -1) {
						ciphertext = ciphertext.substr(0, i) + chara + ciphertext.substr(i + 1);
					} else {
						ciphertext = ciphertext.substr(0, i) + chara;
					}
				} else {
					var keyword = $('#keyword').val().toUpperCase();
					var cipherchar = $('#' + keyindex).find('#' + chara).html(); //find the row and letter corresponding in table
					keyindex++;
					if(keyindex > keyword.length) {
							keyindex = 1; //loop back through imitating making keyword the length of message
					}
					if(i != plaintext.length -1) {
						ciphertext = ciphertext.substr(0, i) + cipherchar + ciphertext.substr(i + 1);
					} else {
						ciphertext = ciphertext.substr(0, i) + cipherchar;
					}
				}
			}
			
			$('#ciphertext').val(ciphertext);
		} else {
			$('#errors').html("You need to build a table first!"); //A table is needed first.
		}
	});
});