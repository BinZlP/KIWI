<?php
	// session start
	session_start();

	include("config.php");

	// getting token & id from session 
	$getSessionToken = $_SESSION['token'];
	$id = $_SESSION['id'];

	// getting token info. of current id from database
	$getDBToken = "select token from kiwi_info where id = '$id'";
	$query_getDBToken = mysqli_query($getDBToken);
	$DBToken = mysqli_result($query_getDBToken,0);

	// checking session's token and DB's token same
	if($DBToken == $getSessionToken && $getSessionToken)
		$login = 1;
	else $login = 0;

?>