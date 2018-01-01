<?php
	include('config.php');

	//funcions
	function rtnPeriod(){
		// Return class period of right now
		$now_hour = date("H",time());
		$now_minute = date("i",time());
		switch($now_hour){
			case 8: return 0; break;
			case 9: return 1; break;
			case 10:
			if($now_minute<30){
				return 1;
			}else{
				return 2;
			}
			break;
			case 11: return 2; break;
			case 12: return 3; break;
			case 13:
			if($now_minute<30){
				return 3;
			}else{
				return 4;
			}
			break;
			case 14: return 4; break;
			case 15: return 5; break;
			case 16:
			if($now_minute<30){
				return 5;
			}else{
				return 6;
			}
			break;
			case 17: return 6; break;
			case 18: return 7; break;
			case 17: return 7; break;
			case 20:
			if($now_minute<40){
				return 7;
			}else{
				return 0;
			}
			default: return 0; break;
		}
		//Returning 0 means there's no class in all classroom
	}

	function rtnBuildingName($number){
		switch($number){
			case 100: return '비마관'; break;
			case 200: return '옥의관'; break;
			case 300: return '복지관'; break;
			case 400: return '화도관'; break;
			case 500: return '참빛관'; break;
			case 600: return '새빛관'; break;
			case 700: return '연구관'; break;
			case 800: return '80주년 기념관'; break;
			case 900: return '동해문화예술관'; break;
			case 1000: return '한울관'; break;
			case 1100: return '누리관'; break;
		}
	}

	$building_no = '600';
	$room_no = '103';

	//Recieving submitted info.
	//$building_no = $_POST['building_no'];
	//$room_no = $_POST['room_no'];

	$room_query = "select * from class_info_test where class_building='$building_no' and class_room='$room_no'"; // Get info. of submitted building_no and room_no

	$res = $db_connect -> query($room_query);
	$row = $res -> fetch_array();

	//echo $row['class_name'];

	//What day is it today?
	$week = array("일", "월", "화", "수", "목", "금", "토");
  	$s = $week[date("w")];
  	//echo $s;

  	//$now_day = rtnPeriod();
  	//echo $now_day;

  	//Print info.
  	if(($row['day1']==$s)||($row['day2']==$s)){
  		if(($row['day1_time']==rtnPeriod())||($row['day2_time']==rtnPeriod())){
  			$bd = rtnBuildingName($building_no);
  			echo $bd;
  			echo ' ';
  			echo $room_no;
  			echo '호<br/>';
  			echo $row['class_name'];
  			echo " - ";
  			echo $row['class_prof'];
  			echo " 교수님<br/>";
  			echo "현재 수업중입니다.<br/>";
  		}else{
  		$bd = rtnBuildingName($building_no);
  		echo "현재 $bd $room_no";
  		echo "호에서는 수업이 없습니다.";
  		}
  	}else{
  		$bd = rtnBuildingName($building_no);
  		echo "현재 $bd $room_no";
  		echo "호에서는 수업이 없습니다.";
  	}

?>
