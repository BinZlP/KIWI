<?
 include("config.php");
 
 $id = $_POST["id"];
 $pw = $_POST["pw"];
 $name = $_POST["name"];
 $usertype = $_POST["usertype"];
 
 $query  = "select id from kiwi_info where id='$id' and pw='$pw'";
 $result = mysql_query($query,$connect);
 $data =  mysql_fetch_array($result);
 $name = $data[name];
 
 $count = mysql_num_rows($result);

 if($count == 1){
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['name']=$name;
	
	header("location: login_test.php");
  
 }else{
	 $error="ID 혹은 PW를 확인해주세요.";
	 exit;
 }
  
 mysql_close($connect);
?>
<script>
 location.href='login_test.php';
</script>