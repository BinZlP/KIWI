<?php
	// session start
	session_cache_limiter('');
	session_start();

	include("config.php");

	$id = $_SESSION['id'];

	// destroy session
	$_SESSION['token'] = 0;
	$_SESSION['id'] = 0;

	// initialize DB's token
	$token_destroy = "update kiwi_info set token=0 where id='$id'";
	$token_destroy = mysql_query($token_destroy);

?>