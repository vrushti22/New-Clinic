<?php
	
	$con = mysqli_connect("localhost","root","");
	if(!$con)
		echo '<h1>You are not connected with server</h1>';
	$db = mysqli_select_db($con,"deproject");
	if(!$db)
		echo '<h1>You are not connected with database</h1>';
?>