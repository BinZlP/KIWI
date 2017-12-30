<?php
 
    include("config.php");  //DB연결을 위한 config.php를 로딩합니다.
    session_start();   //세션의 시작
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $myusername=addslashes($_POST['memeber_id']); 
    $mypassword=addslashes($_POST['password']); 
 
    $sql="SELECT * FROM kiwi_info WHERE id='$myusername' and pw='$mypassword'";
    $result=mysql_query($sql);
    //$row=mysql_fetch_array($result);
    //$active=$row['active'];
 
    $count=mysql_num_rows($result);
 
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1)  //count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다. 
    {
        session_register("myusername");
        $_SESSION['login_user']=$myusername;
 
        header("location: welcome.php");  // welcome.php 페이지로 넘깁니다.
    }
    else 
    {
        $error="Your Login Name or Password is invalid";
    }
}
?>
 
<html>

<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "/KW_project/project.css" />
    <title>main</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="login_form">
      <table>
        <tr>
          <td><h1>KIWI Project</h1></td>
        </tr>
        <tr>
          <td>사용자 구분</td>
          <td></td>
          <td colspan="3" align="left">
            <select name="gubun_code" id="gubun_code" tabindex="1" style="width:143px;" onchange="javascript:fn_showhide();">
                <option value="11">학부생</option>
                <option value="21">교수(Professor)</option>
                <option value="22">직원</option>
                <option value="23">외래강사(Instructor)</option>
                <option value="24">조교</option>
                <option value="25">사환</option>
                <option value="31">일반대학원</option>
                <option value="33">경영대학원</option>
                <option value="34">정보콘텐츠대학원</option>
                <option value="35">교육대학원</option>
                <option value="36">상담복지정책대학원</option>
                <option value="37">환경대학원</option>
                <option value="38">건설법무대학원</option>
                <option value="12">타교생(학부)</option>
                <option value="30">타교생(대학원)</option>
                <option value="51">예산사용자</option>
                <option value="99">게시판담당자</option>
            </select>
          </td>
        </tr>
		<tr>
			<form action="" method="post">
				<label>아 이 디   :</label><input type="text" name="member_no" class="box"/><br>
				<label>패스워드 :</label><input type="password" name="password" class="box" />
				<center><input type="submit" value="로그인"/><br />
			</form>
		</tr>
		<tr>
		<a href="member_login.php">학부생이 아니세요?</a>
		</tr>
		</table>
		<br><br><br><br><br>
	</div>
</body>
</html>