<?php

?>
<html>
	<form method="post" action="printMap.php">
		<select name="building_no" onchange=showFloor(this.value);>
			<option value="100">비마관</option>
			<option value="200">옥의관</option>
			<option value="300">복지관</option>
			<option value="400">화도관</option>
			<option value="500">참빛관</option>
			<option value="600">새빛관</option>
			<option value="700">연구관</option>
			<option value="800">80주년 기념관</option>
			<option value="900">동해문화예술관</option>
			<option value="1000">한울관</option>
			<option value="1100">누리관</option>
		</select>
		
		<select name="floor" id="600" style="display:none";>
			<option value="1">1층</option>
			<option value="2">2층</option>
			<option value="3">3층</option>
			<option value="4">4층</option>
			<option value="5">5층</option>
			<option value="6">6층</option>
			<option value="7">7층</option>
			<option value="8">8층</option>
			<option value="9">9층</option>
		</select>

		<input type="submit" value="이동">
	</form>
	<script>
		function showFloor(building_no){
			document.getElementById(building_no).style.display='inline';
		}
	</script>
</html>