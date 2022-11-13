<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];

		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT id, username, password FROM pdo WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				$stmt = $connect->prepare("SELECT * FROM pdo WHERE username = ?");
				$stmt->execute([$_POST['username']]);
				$data = $stmt->fetch();
				
				// if(password_verify($_POST['password'], $data['password']))
				// {
				// 	echo "OK";
				// }
				// else{
				// 	echo "NOT OK";
				// }
				// die();

				if($data == false){

					$errMsg = "User $username not found.";
					header('Location: login_signup.php');
					
				}
				else {
					if($data && password_verify($password, $data['password'])) 
					{
						$_SESSION['username'] = $data['username'];
						$_SESSION['password'] = $data['password'];

						header('Location: ../index.php');
						exit;
					}
					else
						$errMsg = 'Password not match.';
						header('Location: login_signup.php');
						
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>
