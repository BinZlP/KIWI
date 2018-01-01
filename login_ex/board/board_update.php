<?php
	//데이터 베이스 연결하기
    include "config.php";
    $id = $_GET[id];
    $name = $_POST[writer_name];
    $ucmaid = "1111111111";
    $title = $_POST[title];
    $content = $_POST[content];

    // 글의 비밀번호를 가져온다.
    $query = $db_connect -> query("SELECT pass FROM board WHERE id=$id");
    foreach($query as $row){}

    //입력된 값과 비교한다.
    if ($ucamid==$row[ucamid]) { //비밀번호가 일치하는 경우
        $query = "UPDATE board SET name='$name', email='$email',
        title='$title', content='$content' WHERE id=$id";//업데이트 쿼리문
        $result = $db_connect -> query($query);
    }
    else { // 비밀번호가 일치하지 않는 경우
        echo ("
        <script>
        alert('작성자만 글 수정이 가능합니다.');
        history.go(-1);
        </script>
        ");
        exit;
    }

    //데이터베이스와의 연결 종료
    mysqli_close($db_connect);

    //수정하기인 경우 수정된 글로..
    echo ("<meta http-equiv='Refresh' content='1; 
    URL=read.php?id=$id'>");
?>