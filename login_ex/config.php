<?php
 $mysql_host="localhost";
 $mysql_id="root";
 $mysql_pw="toor";
 $mysql_db="kiwi";
 
 $connect = mysql_connect($mysql_host,$mysql_id,$mysql_pw) or die("Database Connection Error");
 mysql_select_db($mysql_db,$connect) or die("Database Connection Error");
 
?>