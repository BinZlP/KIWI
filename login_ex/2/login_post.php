<?php

session_start();

include("config.php");

$id = $_POST['id'];
$pw = $_POST['pw'];

	//checking existance of entered id
$query = "select id,pw from kiwi_info where id='$id'";

$res = $db_connect -> query($query);
foreach($res as $row){}

if($row['id']){
		// getting pw info. from database
	
	if($row['pw']==$pw){
			// making session key for contrasting login session
		/*
			// create token
		$key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ˆ/';
		$token = '';
		for($i=0;$i<64;$i++){
			$token .= $key[rand(0,63)];
		}
		echo($token);

			// update token on db
		$updateToken = "update kiwi_info set token='$token' where id='$id'";
		$updateToken = mysqli_query($updateToken);

		$_SESSION['token'] = $token;
		*/

		$_SESSION['id'] = $id;
		echo("<script type=\"text/javascript\"> location.href=\"main.php\"; </script>");
		

		return 0;

	} else {
		echo "Check your ID or PW";
		exit;
	}

} else {
	echo "Check your ID or PW";
	exit;
}
?>