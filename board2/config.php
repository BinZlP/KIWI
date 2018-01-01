<?php

	$mysql_id = "root";
	$mysql_pw = "toor";
	$mysql_db = "kiwi";

	$db_connect = @mysqli_connect("localhost","$mysql_id","$mysql_pw","$mysql_db");
	if(!$db_connect){
		$error=mysqli_connect_error();
		$errno=mysqli_connect_errno();
		print "$errno : $error\n";
		exit();
	}

?>