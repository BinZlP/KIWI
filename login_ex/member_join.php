<script>
 function chk_frm(){
   if(!document.join.id.value){
    window.alert('아이디를 입력해 주세요');
    document.join.id.focus();
    return false;
   }
   
   if(!document.join.pw.value){
    window.alert('비밀번호를 입력해 주세요');
    document.join.pw.focus();
    return false;
   }
   if(!document.join.name.value){
    window.alert('이름을 입력해 주세요');
    document.join.name.focus();
    return false;
   }
    
    
 
 return true;  
 }

</script>

<form action="member_add.php" method="post" onsubmit="return chk_frm()" name="join">
  <title> 회원가입 </title>

 <body>
 <table width=550 border=1 align=center>
 <tr>
  <td colspan=2 bgcolor=#99cc00 align=center>회원가입
 <tr>
  <td>아이디
  <td><input type=text name=id size=10 maxlength=12>

 <tr>
  <td>비밀번호
  <td><input type=password name=pw size=10 maxlength=64>
 <tr>
  <td>이름
  <td><input type=text name=name size=10 maxlength=16>
 <tr>
  <td>Usertype
  <td><input type=text name=usertype size=2 maxlength=5>
 <tr>
 <tr>
  <td bgcolor=#eeeeee colspan=2 align=center>
  <input type=submit value='회원가입'>
</table>
</form>
</body>