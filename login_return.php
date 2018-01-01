<html>
<head></head>
<body>

	<?php

	include('Snoopy.class.php');

	$member_no = $_POST['member_no'];
	$password = $_POST['password'];

	header("Content-Type:text/html;charset=utf-8");

	$snoopy = new snoopy;
	$url = "http://info.kw.ac.kr/webnote/login/login_proc.php";

	$auth['login_type'] = '2';
	$auth['check_svc'] = '';
	$auth['redirect_url'] = 'https://info.kw.ac.kr/';
	$auth['layout_opt'] = '';
	$auth['gubun_code'] = '11';
	$auth['member_no'] = $member_no;
	$auth['password'] = $password;
	$auth['image.x'] = '0';
	$auth['image.y'] = '0';
	$auth['p_language'] = 'KOREAN';

	$snoopy -> submit($url,$auth);
	$snoopy -> setcookies();
	$snoopy -> fetch($url);

	$class_paper = "https://info.kw.ac.kr/webnote/lecture/h_lecture01_2.php?layout_opt=&this_year=2017&hakgi=2&open_major_code=$class_no[0]&open_grade=$class_no[1]&open_gwamok_no=$class_no[2]&bunban_no=$class_no[3]&gwamok_kname=%B0%FA%C7%D0%C3%B6%C7%D0%C0%C7%C0%CC%C7%D8&engineer_code=13&skin_opt=&fsel1_code=&fsel1_str=&fsel2_code=&fsel2_str=&fsel2=00_00&fsel3=&fsel4=00_00&hh=&sugang_opt=all&tmp_key=tmp__stu";
	$snoopy -> fetch($class_paper);
	$txt= $snoopy->results;
	$txt2 = iconv('euc-kr','UTF-8',$txt);
	//print_r($txt2);

	$regex = '/[0-9]{10}/';
	preg_match_all($regex,$txt2,$no);

	if(!empty($no[0]))
		echo $member_no;
		//return $no[0][0];
	else
		exit;

	?>


</body>
</html>