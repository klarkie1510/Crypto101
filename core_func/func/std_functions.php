<?php
	function array_sanitize(&$element) {
		$element = mysql_real_escape_string($element);
	}

	//Make sure data is clean, and that tables aren't accidentally dropped or something.
	function sanitize($data) {
		return mysql_real_escape_string($data);
	}
	
	//make the errors look nice. 
	function display_errors($errors) {
		$output = array();
		foreach($errors as $error) {
			$output[] = '<li>' . $error . '</li>';
		}
		return '<ul>' . implode('', $output) . '</ul>';
	}
?>