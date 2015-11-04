<!DOCTYPE html>
<?php session_start(); ?>
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
			<div class='col-md-9'>
				<div class='nav'>
					<a href="index.php" class='btn-nav' >Home</a>
				</div>
				<div class='nav'>
					<a href="index.php?page=about" class='btn-nav' >About</a>
				</div>
				<div class='nav'>
					<a href="index.php?page=updates" class='btn-nav' >Updates</a>
				</div>
			</div>
			<div class='col-md-3'>
				<div class='nav navbar-right'>
					<?php
						if (isset($_SESSION['username'])) {
							echo "<p class='btn-log'>logged in as <a href='#'>".$_SESSION['username']."</a> (<a href='/earth/logout.php' style='
	text-transform: lowercase; font-size: 80%;'>logout</a>)</p>";
						}
						else
						{
							echo "<a href='/earth/registerForm.php?login=' class='btn-nav' >login/register</a>";
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
			<div class='col-md-2'>
				<?php //include("display_topics.php"); 
					if (isset($_SESSION['username'])) { 
						//include('post_new_topic.php');
						echo '<p> you are logged in </p>';
				} else {
					echo '<p> you are not logged in </p>';
				} ?>
			</div>
			<div class='col-md-10'>

				<div class='row'>
					<div class='col-md-6'>
						<h4>Topic</h4>
					</div>
					<div class='col-md-4'>
						<h4 class='pull-right'>Author</h4>
					</div>
					<div class='col-md-2'>
						<h4 class='pull-right'>Posted At</h4>
					</div>
				</div>

				<?php include("display_topics.php"); 
					if (isset($_SESSION['username'])) { 
						include('post_new_topic.php');
				} ?>
			</form>
			</div>
		</div>
	</div>
</body>
</html>