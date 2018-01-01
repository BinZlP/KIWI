<?php
	require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 글쓰기</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
</head>
<body>
	<article class="boardArticle">
		<h3>자유게시판 글쓰기</h3>
		<div id="boardWrite">
			<form action="./board_write_update.php" method="post">
				<table id="boardWrite">
					<caption class="readHide">자유게시판 글쓰기</caption>
					<tbody>
						<tr>
							<th scope="row"><label for="writer_name">아이디</label></th>
							<td class="id"><input type="text" name="writer_name" id="writer_name"></td>
						</tr>
						<tr>
							<th scope="row"><label for="ucamid">학번</label></th>
							<td class="id"><input type="text" name="ucamid" id="ucamid"></td>
						</tr>
						<tr>
							<th scope="row"><label for="title">제목</label></th>
							<td class="title"><input type="text" name="title" id="title"></td>
						</tr>
						<tr>
							<th scope="row"><label for="content">내용</label></th>
							<td class="content"><textarea name="content" id="content"></textarea></td>
						</tr>
					</tbody>
				</table>
				<div class="btnSet">
					<button type="submit" class="btnSubmit btn">작성</button>
					<a href="./board_main.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	</article>
</body>
</html>