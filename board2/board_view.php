<?php
require_once("config.php");
$bNo = $_GET['no'];

$sql = "select title, content, written_date, view, id from board where no = '$bNo'"
$result = $db_connect->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>
<body>
	<article class="boardArticle">
		<h3>자유게시판 글쓰기</h3>
		<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?php echo $row['id']?></span>
				<span id="boardDate">작성일: <?php echo $row['written_date']?></span>
				<span id="boardHit">조회: <?php echo $row['view']?></span>
			</div>
			<div id="boardContent"><?php echo $row['content']?></div>
		</div>
	</article>
</body>
</html>