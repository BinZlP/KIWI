<?php
 include("config.php");
 
 $id = $_POST["id"];
 $pw = $_POST["pw"];
 $name = $_POST["name"];
 $usertype = $_POST["usertype"];
  
 $query = "insert into kiwi_info(id,pw,name,usertype)
    values('$id','$pw','$name','$usertype');";
 mysql_query($query, $connect);
 mysql_close($connect);

?>
<script>
alert('회원가입이 완료되었습니다.');
location.href='login_test.php';
</script>