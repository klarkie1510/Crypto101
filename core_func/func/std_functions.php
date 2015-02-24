<?php
	//Make sure data is clean, and that tables aren't accidentally dropped or something.
	function sanitize($data) {
		return mysql_real_escape_string($data);
	}
?>