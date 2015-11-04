<?php

	include('db_connect.php');
	$q = 'SELECT ID, title, author, date, category FROM thread;';
	$result = db_query($q);
	while ($row = $result->fetch_assoc())
	{
		echo '<div class="row">';
		echo '<div class="col-md-6">';
		echo '<a href="?show_topic='.$row['ID'].'">'.$row['title'].'</a>';
		echo '</div>';
		echo '<div class="col-md-4">';
		echo '<p class="pull-right">posted by <a href="#">'.$row['author'].'</a></p>';
		echo '</div>';
		echo '<div class="col-md-2">';
		echo '<p class="pull-right">'.date("d M y, g:i a", strtotime($row['date'])).'</p>';
		echo '</div>';
		echo '</div>';
	}

?>