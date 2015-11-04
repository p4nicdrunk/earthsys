<?php

	include('db_connect.php');
	$pass = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
	$q = 'INSERT INTO user (username, email, password) VALUES ("'.htmlspecialchars($_POST['username']).'","'.htmlspecialchars($_POST['email']).'","'.$pass.'")';
	db_query($q);
	header("Location: http://salviha.us/earth/index.php");
	//die();

?>