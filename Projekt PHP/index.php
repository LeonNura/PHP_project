
<?php
	require 'php/config.php';
	if(empty($_SESSION['username']))
		header('Location: php/login_signup.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Snake Game</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body >

	<div class="div">

	<a href="https://shkolladigjitale.com/" target="_blank"><img src="img/logo.png"></a>

<h1>Play Snake Game</h1>
<nav>
	<ul>
		<a href="">Welcome, <?php echo $_SESSION['username'];?> <a href="php/update.php"><i class="fas fa-edit" name='update'></a></i></a>
		<a href="index.php"><li class="active">Snake Game</li></a>
		<a href="about.php"><li>How to play game</li></a>
		<a href="php/logout.php"><li>Log out</li></a>
	</ul>
</nav>
</div>

<div id="msg"></div>

<center><h3 id="h3"></h3></center>

<center><canvas id="playArea" width="550" height="400"></canvas></center>

<center><button id="btn">Start game</button></center>

<center>
	<footer>
		&copy; Shkolla Digjitale
	</footer>	
</center>

<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
</body>
</html>