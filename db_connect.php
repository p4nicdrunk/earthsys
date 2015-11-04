<?php
define('DBHOST','localhost');
define('DBUSER','cl55-earthsys');
define('DBPASS','fortran90');
define('DBNAME','cl55-earthsys');

function db_connect() {
	static $connection;

	if(!isset($connection)) {
		$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	}

	if($connection === false) {
		$conn_err = mysqli_connect_error();
		echo '<p>something fucked up it was this: '.$conn_err.'</p>';
		return $conn_err;
	}
	return $connection;
}

function db_query($q) {
	$connection = db_connect();
	$result =  mysqli_query($connection, $q);
	return $result;
}

function isTaken($table, $field, $value) {
	$connection = db_connect();
	$result =  mysqli_query($connection, "SELECT COUNT FROM ".$table." WHERE ".$field." = '".$value."';");
	return $result;
}

?>