<?php
	require_once("config.php");

	$bID = $_POST['writer_name'];
	$bPassword = $_POST['ucamid'];
	$bTitle = $_POST['title'];
	$bContent = $_POST['content'];
	
	$date = date('Y-m-d H:i:s');


	$sql = "insert into board (title, content, written_date, view, writer_name, ucamid) values('$bTitle', '$bContent', '$date', 0, '$bID', '$bPassword')";

	$result = $db_connect->query($sql);
	if($result) { // query가 정상실행 되었다면,
		$msg = "정상적으로 글이 등록되었습니다.";
		$bNo = $db_connect->insert_id;
		$replaceURL = './view.php?no=' . $bNo;
	} else {
		$msg = "글을 등록하지 못했습니다.";
?>
		<script>
			alert("<?php echo $msg?>");
			//history.back();
		</script>
<?php
	}

?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>