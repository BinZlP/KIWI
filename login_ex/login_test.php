<?php
 include("config.php");
 session_start();
 $user_check=$_SESSION['login_user'];
 
 $ses_sql = mysql_query("select name from kiwi_info where name=$user_check");
 
 $row=mysql_fetch_array($ses_sql);
 
 $login_session=$row[name];
 
 if(!isset($login_session)){
	 header("Location: login.php");
 }
 
 if($login_session != NULL){?>
 <?echo $login_session?>님 로그인하셨습니다
 <a href='logout.php'>로그아웃</a>
 
 <?}else{?>
  로그인하지 않았습니다<br>
  <a href='member_join.php'>회원가입하기</a>
  <a href='login.php'>로그인하기</a>
 <?}?>