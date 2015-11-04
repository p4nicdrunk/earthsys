<?php
	session_start();
	include('db_connect.php');

	$q = 'INSERT INTO thread (ugroup, author, category, title) VALUES ("test","'.$_SESSION['username'].'", "'.$_POST['category'].'", "'.$_POST['title'].'")';
	db_query($q);

	$q2 = 'SELECT ID FROM thread WHERE title="'.$_POST['title'].'" ORDER BY ID DESC';
	$result = db_query($q2);
	$row = $result -> fetch_array();

	$q3 = 'INSERT INTO posts (author, thread_ID, message) VALUES ("'.$_SESSION['username'].'", "'.$row[0].'", "'.$_POST['body'].'")';
	db_query($q3);

	header("Location: http://salviha.us/earth/index.php");
	//die();

?>