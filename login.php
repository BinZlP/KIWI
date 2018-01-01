<? session_start(); ?>
<?php
	$member_no = "member_no";
	$password = "password";
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset = "utf-8">
		<title> Logging in... </title>
	</head>
	<body>
		<? if (!isset($_POST["member_id"])) { ?>
			<p style="text-align: center;"> ID가 입력되지 않았습니다. </p>
			<p style="text-align: center;"><a href="login.php">로그인</a></p>

		<? } else if (!isset($_POST["password"])) { ?>
			<p style="text-align: center;"> PW가 입력되지 않았습니다. </p>
			<p style="text-align: center;"><a href="login.php">로그인</a></p>

		<? } else { ?>
			<? if strcmp($_POST["member_no"], $member_no != 0) { ?>
				<p style="text-align: center;">ID 혹은 PW를 확인하세요.</p>
				<p style="text-align: center;"><a href="login.php">다시 로그인</a></p>

			<? } else if (strcmp($_POST["password"],$password) != 0) { ?>
				<p style="text-align: center;">ID 혹은 PW를 확인하세요.</p>
				<p style="text-align: center;"><a href="login.php">다시 로그인</a></p>

			<? } else { ?>
				<? $_SESSION["member_no"] = $_POST["member_no"]; ?>
				<? $_SESSION["password"] = $_POST["password"]; ?>
				<p style="text-align: center;">로그인 성공</p>
				<p style="text-align: center;"><a href="main.php">메인</a></p>
			<? } ?>
			<? } ?>
			}
		}
	</body>
</html>