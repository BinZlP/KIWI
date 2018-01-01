<?php
	// login info. of mysql
	
	$mysql_id = "root";
	$mysql_pw = "toor";
	$mysql_db_name = "kiwi_info";
	$mysql_host = "localhost";

	$connect = mysqli_connect($mysql_host,$mysql_id,$mysql_pw);
	mysqli_select_db($mysql_db_name,$connect);

?>