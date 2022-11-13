<?php
	require 'config.php';
	session_destroy();

	header('Location: login_signup.php');
?>