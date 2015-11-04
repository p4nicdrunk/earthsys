<?php
	$q = 'SELECT title FROM thread_categories;';
	$result = db_query($q);
	while ($row = $result->fetch_assoc())
	{
		echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
	}

?>