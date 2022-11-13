<?php 
	include_once("config.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$hash = password_hash($password, PASSWORD_BCRYPT);

	if(empty($username) || empty($password) || empty($email))
	{
		echo "Ploteso formen e paplotsuar!";
	}
	else
	{
		$sql = "UPDATE pdo SET username=:username, password=:password WHERE email=:email";

		$rezultati  = $connect->prepare($sql);

		$rezultati->bindParam(':username', $username);
		$rezultati->bindParam(':password', $hash);
		$rezultati->bindParam(':email', $email);

		$rezultati->execute();
	}  
 

 	$sql = "SELECT * FROM pdo WHERE email=:email";
 	$rezultati = $connect->prepare($sql);
 	$rezultati->execute(array(":email"=> $email
 ));


 	while($rreshti = $rezultati->fetch(PDO::FETCH_ASSOC) )
 	{
 		$username = $rreshti['username'];
 		$password = $rreshti['password'];
 		$email = $rreshti['email'];
 	}

 	if ($email !== 'email') {
 		$errMsg = "Email $email not found.";
 	}
 	else
 	{
 		header('Location: login_signup.php');
 	}
 ?>

<html>
<head><title>Update</title></head>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>
	<link rel="stylesheet" type="text/css" href="../login/css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</style>

<body>
<nav>
	<ul>
		<a href="logout.php" class="logout"><li>Log out</li></a>
	</ul>
</nav>
	<form action="update.php" method="POST">

<div class="materialContainer">
	<div class="box">
      <div class="title">UPDATE</div>
      <h5 class="pass-forgot"><i>"Put your informations and log out"</i></h5>
      <div class="input">
      		     	
      	<br>
         <label for="regname">Username</label>
         <input type="text" name="username" id="regname">
         <span class="spin"></span>
      </div>
      <div class="input">
         <label for="reregpass">Original email</label>
         <input type="text" name="email" id="reregpass">
         <span class="spin"></span>
      </div>
      <div class="input">
         <label for="regpass">Password</label>
         <input type="password" name="password" id="regpass">
         <span class="spin"></span>
      </div>
      <div class="button login">
         <button type="submit" name="update"><span>Update</span><i class="fa fa-check"></i></button>
      </div>
   </div>
</div>
</div>

</form>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="../login/js1/index.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/main.js"></script>

</body>
</html>