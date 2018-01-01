<?php
include("config.php");

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
				return 9;
			}
			default: return 9; break;
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

//$building_no = 600;
//$floor = 1;

$building_no = $_POST['building_no'];
$floor = $_POST['floor'];

$mapquery = "select * from map_inside where building_no='$building_no' and floor='$floor'";

$res = $db_connect -> query($mapquery);


// Import style sheet
echo '<link href="map_css.css" rel = "stylesheet" ?>';
echo '<table class="tg">';

foreach($res as $row2){}
$ver_scale = $row2['ver_no'];
$hor_scale = $row2['hor_no'];

//echo $ver_scale,$hor_scale;

$printCnt = 1;

foreach($res as $row){
	if(!empty($row)){

		if($printCnt==1)
			echo "<tr>";

		$room_no = $row['room_no'];

		$week = array("일", "월", "화", "수", "목", "금", "토");
  		$now_day = $week[date("w")];

  		$period = rtnPeriod();

		$room_query = "select * from class_info_test where class_building='$building_no' and class_room='$room_no' and ((day1='$now_day' and day1_time='$period') or (day2='$now_day' and day2_time='$period'))";

		$result = $db_connect -> query($room_query);
		$rowrow = $result -> fetch_array();



			// Print horizontal line of map
		echo "<th class=";

				// Print vertical line of map
		switch($row['block_type']){
			case 0:
			echo '"path">';
			break;
			case 1:
			echo '"room1"';
			echo "onclick='location.href=";
  			echo '"../freeboard/board/index.php"';
  			echo "'>";
			echo "<span id='tooltip-span'>";
			echo rtnBuildingName($row['building_no']);
			echo " ";
			echo $row['room_no'];
			echo "호<br/>";
			if($rowrow){
  				echo $rowrow['class_name'];
  				echo " - ";
  				echo $rowrow['class_prof'];
  				echo " 교수님<br/>";
  				echo "현재 수업중입니다.<br/>";
  			}else{
  				echo "현재 이 강의실에서는 수업이 없습니다.";
  			}
			break;

			case 2:
			echo '"room2"';
			echo "onclick='location.href=";
  			echo '"../freeboard/board/index.php"';
  			echo "'>";
			echo "<span id='tooltip-span'>";
			echo rtnBuildingName($row['building_no']);
			echo " ";
			echo $row['room_no'];
			echo "호<br/>";
			if($rowrow){
  				echo $rowrow['class_name'];
  				echo " - ";
  				echo $rowrow['class_prof'];
  				echo " 교수님<br/>";
  				echo "현재 수업중입니다.<br/>";
  			}else{
  				echo "현재 이 강의실에서는 수업이 없습니다.";
  			}
			break;

			case 3:
			echo '"room3"';
			echo "onclick='location.href=";
  			echo '"../freeboard/board/index.php"';
  			echo "'>";
			echo "<span id='tooltip-span'>";
			echo rtnBuildingName($row['building_no']);
			echo " ";
			echo $row['room_no'];
			echo "호<br/>";
			if($rowrow){
  				echo $rowrow['class_name'];
  				echo " - ";
  				echo $rowrow['class_prof'];
  				echo " 교수님<br/>";
  				echo "현재 수업중입니다.<br/>";
  			}else{
  				echo "현재 이 강의실에서는 수업이 없습니다.";
  			}
			break;

			case 10:
			echo '"door"';
			if($row['room_no']!=0){
				echo '"room3"';
				echo "onclick='location.href=";
  				echo '"../freeboard/board/index.php"';
				echo "'>";
				echo "<span id='tooltip-span'>";
				echo rtnBuildingName($row['building_no']);
				echo " ";
				echo $row['room_no'];
				echo "호";
				echo "<br/>";
				if($rowrow){
  					echo $rowrow['class_name'];
  					echo " - ";
  					echo $rowrow['class_prof'];
  					echo " 교수님<br/>";
  					echo "현재 수업중입니다.<br/>";
				}else{
					echo "현재 이 강의실에서는 수업이 없습니다.";
				}
  			}else{
  				echo "onclick='location.href=";
  				echo '"map_main.php"';
  				echo "'>";
  				echo "<span id='tooltip-span'>";
				echo rtnBuildingName($row['building_no']);
				echo " ";
  				echo "출입구<br/>";
  			}
			break;

			case 11:
			echo '"outside">';
			break;
			case 20:
			echo '"maru">';
			break;
			case 21:
			echo '"stair">';
			//echo "<span id='tooltip-span'>";
			//echo "계단</span>";
			break;
			case 22:
			echo '"elevator">';
			//echo "<span id='tooltip-span'>";
			//echo "엘리베이터</span>";
			break;
			case 23:
			echo '"toilet">';
			//echo "<span id='tooltip-span'>";
			//echo "화장실</span>";
			break;
			case 24:
			echo '"copyRoom">';
			//echo "<span id='tooltip-span'>";
			//echo "복사실</span>";
			break;
			case 30:
			echo '"secuOffice">';
			//echo "<span id='tooltip-span'>";
			//echo "경비실</span>";
			break;
			case 31:
			echo '"lab1">';
			break;
			case 32:
			echo '"lab2">';
			break;
			case 33:
			echo '"lab3">';
			break;
			case 99:
			echo '"nth">';
			break;
		}
		echo "</th>";	

		if($printCnt==$hor_scale){
			echo "</tr>";
			$printCnt = 0;
		}

		$printCnt += 1;
	}else{
		echo "ERROR";
	}
}






?>