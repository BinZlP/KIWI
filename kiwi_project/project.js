function login_fun() {
    var objid=document.getElementById("stu_num");
    var objpw=document.getElementById("password");
    if(objid.value=="")
    {
      alert("학번을 입력하세요.");
      objid.focus();
      return;
    }
    else if(objpw.value=="")
    {
      alert("비밀번호를 입력하세요.");
      objpw.focus();
      return;
    }
    //로그인 체크필요
    if (objpw.value=="1234" && objid.value=="2016726020")
    {
    //  var objdisplay=document.getElementById("login_form2");
    //  objdisplay.style.display=block;
      window.open("/KW_project/main.html","_self");
    }
}
function getwidth(num){
  var GH=window.innerWidth/num;
  GH+="px";
  return GH;
}
