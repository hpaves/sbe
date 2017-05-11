<?php 
	if (session_status() == PHP_SESSION_NONE) {
	 	session_start();
		//3.1.4 if the user is logged in Greets the user with message
		if (!empty($_SESSION['username'])){
		$username = $_SESSION['username'];
		// display the rest of the code
		 
		} else {
		// redirect to the login page
		$rootfolder = file_get_contents('./rootfolder.txt', FILE_USE_INCLUDE_PATH);
		header('Location: ' . $rootfolder . '');
		}
	}
 ?>