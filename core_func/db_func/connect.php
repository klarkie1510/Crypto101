<?php
//Connect with the host and database
$connection_error = "Sorry, we are unable to connect to the database.";
//Connecting to the database
mysql_connect('localhost', 'root', '') or die($connection_error);
//Selecting a database to work with. 
mysql_select_db('crypto') or die($connection_error);
?>