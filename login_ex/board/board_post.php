<?php

include("config.php");

$id = $_GET[id];
$name = $_POST[name];
$title = $_POST[title];
$content = $_POST[content];

$query = "INSERT INTO board 
(id, writer_name, ucamid, title, content, written_date, view, board_no)
VALUES ('', '$name', '1111111111', '$title', 
'$content', now(), 0, 9999)";
$result = $db_connect -> query($query);

mysqli_close($db_connect);

echo ("<script type=\"text/javascript\"> alert(\"Saved Successfully.\"); </script>");
echo ("<script type=\"text/javascript\"> location.href=\"board_list.php\"; </script>");
?>