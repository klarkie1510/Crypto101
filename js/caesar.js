$(function() {
	//When 'Left Shift' is clicked.
	$('#shift-left').click(function() {
		$('#cipher-char td:not(:first)').each(function() { //for each letter in the table
			var str = $(this).html(); //get the value
			var max = 90; //ascii value of Z
			str = str.charCodeAt(0); //get the ascii value
			if(str == max) { //is the ascii value is Z, wrap to A
				str = 65;
			} else {
				str = str + 1; //else increase by one
			}
			str = String.fromCharCode(str); //get new character from ascii code
			$(this).html(str);
		});
		
		var shift_val = parseInt($('#shift_value').val()); // SET
		if(shift_val == 25) {							   // THE
			shift_val = 0;								   // NEW
		} else {										   // SHIFT
			shift_val = shift_val + 1;					   // VALUE
		}
		$('#shift_value').val(shift_val);
	});
	
	    //SAME FUCNTION AS ABOVE BUT IN REVERSE
		$('#shift-right').click(function() {
		$('#cipher-char td:not(:first)').each(function() {
			var str = $(this).html();
			var min = 65;
			str = str.charCodeAt(0);
			if(str == min) {
				str = 90;
			} else {
				str = str - 1;
			}
			str = String.fromCharCode(str);
			$(this).html(str);
		});
		
		var shift_val = parseInt($('#shift_value').val());
		if(shift_val == 0) {
			shift_val = 25;
		} else {
			shift_val = shift_val - 1;
		}
		$('#shift_value').val(shift_val);
	});
	
	
});

$(function() {
	$('#Encode').click(function() {
		var plaintext = $('#plaintext').val(); //Get plain text
		var ciphertext = $('#plaintext').val();
		for(var i = 0; i < plaintext.length; i++) { //For each character in the plaintext
			var chara = plaintext.charAt(i);
			if(!chara.match(/^[a-zA-Z]+$/)) { //If not alphabet, just pass it through. /[A-z]/i
				if(i != plaintext.length -1) {
					ciphertext = ciphertext.substr(0, i) + chara + ciphertext.substr(i + 1);
				} else {
					ciphertext = ciphertext.substr(0, i) + chara;
				}
			} else {
				var shift_val = parseInt($('#shift_value').val()); //If it is alphabet, increase it by the shift value
				for(var j = 0; j < shift_val; j++) {
					var maxCap = 90;
					var maxLow = 122;
					chara = chara.charCodeAt(0);
					if(chara == maxCap) {
						chara = 65;
					} else if(chara == maxLow){
						chara = 97;
					} else {
						chara = chara + 1;
					}
					chara = String.fromCharCode(chara);
					if(i != plaintext.length -1) {
						ciphertext = ciphertext.substr(0, i) + chara + ciphertext.substr(i + 1);
					} else {
						ciphertext = ciphertext.substr(0, i) + chara;
					}
				}
			}
		}
		$('#ciphertext').val(ciphertext);
	});
});

$(function() {
	$('#Decode').click(function() {
		var ciphertext = $('#ciphertext').val();
		var plaintext = $('#ciphertext').val();
		for(var i = 0; i < ciphertext.length; i++) {
			var chara = ciphertext.charAt(i);
			if(!chara.match(/[A-z]/i)) {
				if(i != plaintext.length -1) {
					ciphertext = ciphertext.substr(0, i) + chara + ciphertext.substr(i + 1);
				} else {
					ciphertext = ciphertext.substr(0, i) + chara;
				}
			} else {
				var shift_val = parseInt($('#shift_value').val());
				for(var j = 0; j < shift_val; j++) {
					var minCap = 65;
					var minLow = 97;
					chara = chara.charCodeAt(0);
					if(chara == minCap) {
						chara = 90;
					} else if(chara == minLow){
						chara = 122;
					} else {
						chara = chara - 1;
					}
					chara = String.fromCharCode(chara);
					if(i != ciphertext.length -1) {
						plaintext = plaintext.substr(0, i) + chara + plaintext.substr(i + 1);
					} else {
						plaintext = plaintext.substr(0, i) + chara;
					}
				}
			}
		
		$('#plaintext').val(plaintext);
		}
	});
});