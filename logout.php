<?php
	session_start();
	session_unset();
	session_destroy();
	$_SESSION = Array();
	header("Location: http://salviha.us/earth/index.php");
?>