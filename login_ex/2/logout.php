<?php
	session_start();
	if(session_destroy()){
		echo("<script type=\"text/javascript\"> location.href=\"login.html\"; </script>");
	}
	
	
?>