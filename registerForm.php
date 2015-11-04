<?php
session_start();
	if (isset($_GET['register']) && $_GET['register']=="yes") {
		include('db_connect.php');
		$pass = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
		$q = 'INSERT INTO user (username, email, password) VALUES ("'.htmlspecialchars($_POST['username']).'","'.htmlspecialchars($_POST['email']).'","'.$pass.'")';
		db_query($q);
		header("Location: http://salviha.us/earth/index.php");
	}
	else if (isset($_GET['register']) && $_GET['register']=="no") {
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
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400, 600' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<div class='nav'>
					<a href="index.php" class='btn-nav' >Home</a>
				</div>
				<div class='nav'>
					<a href="#" class='btn-nav' >About</a>
				</div>
				<div class='nav'>
					<a href="#" class='btn-nav' >Menu</a>
				</div>
			</div>
			<div class='col-md-6'>
			</div>
			<div class='col-md-3'>
				<div class='nav navbar-right'>
					<?php 
					 if (isset($_SESSION['username'])) { 
						?> <p class='btn-nav'>logged in as <a href='#'><? echo $_SESSION['username'] ?></a></p><?php
					 } 
					 else { 
						?><a href="/earth/registerForm.php" class="btn-nav">login</a><?php
					 } 
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<div class="main">
			</div>
		</div>
	</div>

	<div class='container'>
		<div class='row'>
			<div class='col-md-4'>
			</div>

			<?php if (isset($_GET['login']) && $_GET['login']=="register") { ?> 
			<div class='col-md-4'>
				<p>Register New Account</p>
			<form method="post" action="registerForm.php?register=yes" id="registerForm">
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="1">
				</div>
				<div class="form-group">
					<input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="2">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				<input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-large" tabindex="4">
			</form>
				<p>or <a href="/earth/registerForm.php?login=login">log in to current account</a></p>
			</div>
			<?php } else { ?>
			<div class='col-md-4'>
				<p>Log in if you already have an account</p>
			<form method="post" action="registerForm.php?register=no" id="loginForm">
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="5">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="6">
				</div>
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-large" tabindex="7">
			</form>
				<p>or <a href="/earth/registerForm.php?login=register">register new account</a></p>
			</div>
			<?php } ?>

			<div class='col-md-4'>
			</div>
		</div>
	</div>
	
</body>
</html>