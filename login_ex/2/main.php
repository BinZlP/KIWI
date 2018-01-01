<?php
session_start();
if($_SESSION['id']==NULL){
	echo("<script type=\"text/javascript\"> 
		alert(\"Login First.\"); 
		location.href(\"login.html\"); </script>");
	exit;
}else{
	$cur_id = $_SESSION['id'];
	echo("$cur_id님 환영합니다.\n");
}

?>

<html>
<a href="logout.php">logout</a>
</html>