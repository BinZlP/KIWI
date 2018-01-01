<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php

include('Snoopy.class.php');
include('config.php');
header("Content-Type:text/html;charset=utf-8");

$snoopy = new snoopy;
$url = "http://info.kw.ac.kr/webnote/login/login_proc.php";

$auth['login_type'] = '2';
$auth['check_svc'] = '';
$auth['redirect_url'] = 'https://info.kw.ac.kr/';
$auth['layout_opt'] = '';
$auth['gubun_code'] = '11';
$auth['member_no'] = '2017203044';
$auth['password'] = '@Faksjdfi1';
$auth['image.x'] = '0';
$auth['image.y'] = '0';
$auth['p_language'] = 'KOREAN';

$snoopy -> submit($url,$auth);

$snoopy -> setcookies();

$snoopy -> fetch($url);

$url_class = "https://info.kw.ac.kr/webnote/lecture/h_lecture.php?mode=view&user_opt=&skin_opt=&layout_opt=&show_hakbu=&this_year=2017&hakgi=2&sugang_opt=all&hh=&prof_name=&fsel1=00_00&fsel2=00_00&fsel4=00_00&captcha=2006&x=22&y=11";

$snoopy -> fetch($url_class);

$txt = $snoopy->results;
$txt2 = iconv('euc-kr','UTF-8',$txt);

$regex = "/.[0-9]{3}-[0-9]-[0-9]{4}-[0-9]{2}/";

preg_match_all($regex,$txt2,$classes);

/*
for($i = 0; $i < sizeof($classes[0]); $i++){

}
*/

print $classes[0][0]."<br/>";
$class_no = explode("-",$classes[0][0]);
$class_paper = "https://info.kw.ac.kr/webnote/lecture/h_lecture01_2.php?layout_opt=&this_year=2017&hakgi=2&open_major_code=$class_no[0]&open_grade=$class_no[1]&open_gwamok_no=$class_no[2]&bunban_no=$class_no[3]&gwamok_kname=%B0%FA%C7%D0%C3%B6%C7%D0%C0%C7%C0%CC%C7%D8&engineer_code=13&skin_opt=&fsel1_code=&fsel1_str=&fsel2_code=&fsel2_str=&fsel2=00_00&fsel3=&fsel4=00_00&hh=&sugang_opt=all&tmp_key=tmp__stu";
$snoopy -> fetch($class_paper);
$res = $snoopy->results;
$res2 = iconv('euc-kr','UTF-8',$res);
//print_r($res2);
$regex_time = "/[가-힣][0-9]{3}/";
preg_match_all($regex_time,$res2,$class_room_info);
for($i=0;$i<2;$i++){
	//$class_room_info[0][$i] = mb_convert_encoding($class_room_info[0][$i],'UTF-8','euc-kr');
	echo $class_room_info[0][$i]."<br/>";
	$class_building = substr($class_room_info[0][$i],0,1);

	/*
	$class_building = iconv($class_building,'euc-kr','UTF-8');
	print $class_building."<br/>";
	$class_building = mb_convert_encoding('UTF-8','euc-kr',$class_building);
	print $class_building."<br/>";
	*/


	$class_room = substr($class_room_info[0][$i],1,3);
	echo $class_building.' '.$class_room.'<br/>';
}


/*
for($i=0;$i<sizeof($class_room_info[0]);$i++){
	print $class_room_info[0][$i]."<br/>";
}
*/


/*
for($i=1;$i<1;$i++){
	$class = explode(">",$classes[1]);
	$classes = explode("<",$class[1]);
	$class_number = explode("-",$classes[0]);
	
	echo $class_number[0];
	echo "<br/>";
	echo $class_number[1];
	echo "<br/>";
	echo $class_number[2];
	echo "<br/>";
	echo $class_number[3];
	echo "<br/>";
}
*/



//body > table:nth-child(3) > tbody > tr > td:nth-child(2) > table > tbody > tr > td > table > tbody > tr:nth-child(2) > td:nth-child(2) > form:nth-child(8) > table:nth-child(7) > tbody > tr:nth-child(2) > td:nth-child(1)


//print_r($txt2);

?>

</body>
</html>