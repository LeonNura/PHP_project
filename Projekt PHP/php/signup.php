<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		
	
		// Get data from FROM
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_BCRYPT);

		if($username == '')
			$errMsg = 'Enter your username';
		if($email == '')
			$errMsg = 'Enter email';
		if($password == '')
			$errMsg = 'Enter password';

		// $email_data = $connect->prepare("SELECT * FROM pdo WHERE email = :email");
		// $email_data->execute();
		// $data = $email_data->fetch(PDO::FETCH_ASSOC);

		// if ($email == $data) {
		// 	$errMsg = 'Enter another email';
		// }

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO pdo (username, email, password) VALUES (:username, :email, :password)');

					$stmt = $connect->prepare('SELECT id, username, email, password FROM pdo WHERE email = :email');
					$stmt->execute(array(
					':email' => $email
					));
					$data = $stmt->fetch(PDO::FETCH_ASSOC);

					if($data == true){

					$errMsg = "User $Email already qitu o";

					}
					else { 

						$sqlQuery = $con->prepare($sql);
						$sqlQuery->bindparam(':id', $id);
						$sqlQuery->bindparam(':username', $username);
						$sqlQuery->bindparam(':email', $email);
						$sqlQuery->bindparam(':password', $hash/*$Password*/);
						$sqlQuery->execute();

						header("location:login.php");
						exit;
					}
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
?>