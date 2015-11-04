<?php
	session_start();
	include('db_connect.php');
	$q = 'SELECT password FROM user WHERE username="'.$_POST['username'].'"';
	$result = db_query($q);
	$row = $result -> fetch_array();
	if (password_verify(htmlspecialchars($_POST['password']), $row[0])) {
		$_SESSION['username']=$_POST['username'];
		echo $_POST['username'];
		echo ' yes';
		header("Location: http://salviha.us/earth/index.php");
	}
	else {
		echo ' no';
		header("Location: http://salviha.us/earth/registerForm.php");
	}

?>