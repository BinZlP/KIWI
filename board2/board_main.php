<?php
	require_once("config.php");
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
		<h3>자유게시판</h3>
		<table>
			<caption class="readHide">자유게시판</caption>
			<thead>
				<tr>
					<th scope="col" class="no">번호</th>
					<th scope="col" class="title">제목</th>
					<th scope="col" class="author">작성자</th>
					<th scope="col" class="date">작성일</th>
					<th scope="col" class="hit">조회</th>
				</tr>
			</thead>
			<tbody>
					<?php
						$sql = 'select * from board order by no desc';
						$result = $db_connect->query($sql);
						while($row = $result->fetch_assoc())
						{
							$datetime = explode(' ', $row['written_date']);
							$date = $datetime[0];
							$time = $datetime[1];
							if($date == Date('Y-m-d'))
								$row['written_date'] = $time;
							else
								$row['written_date'] = $date;
					?>
				<tr>
					<td class="no"><?php echo $row['no']?></td>
					<td class="title"><?php echo $row['title']?></td>
					<td class="author"><?php echo $row['writer_name']?></td>
					<td class="date"><?php echo $row['written_date']?></td>
					<td class="hit"><?php echo $row['view']?></td>
				</tr>
					<?php
						}
					?>
			</tbody>
		</table>
	</article>
</body>
</html>