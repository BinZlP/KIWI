<?php
	// session start
	session_start();

	// mysql login info.
	$mysql_id = "root";
	$mysql_pw = "toor";
	$mysql_db_name = "kiwi";
	$db_host = "localhost";

	// connecting mysql
	$connect = mysqli_connect($db_host,$mysql_id,$mysql_pw);
	mysqli_select_db($mysql_db_name,$connect);

	// getting info. of posted login form
	$id = $_POST('memberID');
	$pw = $_POST('memberPW');

	// checking id exists in database
	$query = "select id from kiwi_info where id='$id'";
	$res = mysqli_query($query);
	$row = mysqli_fetch_array($query);

	// check password if id exists
	if($row['id']){
		// getting pw info. from database
		$query_pw = "select pw from kiwi_info where id='$id'";
		$res_pw = mysqli_query($query_pw);
		$row_pw = mysqli_result($res_pw,0);

		if($row_pw==$pw){
			// making session_key for contrasting login session
			$key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ˆ/';
			for($i=0;$i<64;$i++)
				$token .= $key[rand(0,63)];

			// updating token to database
			$updateToken = "update kiwi_info set token='$token' where id='$id'";
			$updateToken = mysqli_query($updateToken);

			// registering token value to session
			$_SESSION['token'] = $token;

			echo("<script type=\"text/javascript\">
				location.href=\"main.php\";
			</script>");
			
			return 0;
		} else {
			echo "Check your ID or PW.";
			exit;
		}
	} else {
		echo "Check your ID or PW.";
		exit;
	}
?>
