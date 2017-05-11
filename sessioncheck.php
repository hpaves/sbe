<?php 
	//3.1.4 if the user is logged in Greets the user with message
	if (isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	echo "Hai " . $username . "
	";
	echo "This is the Members Area
	";
	echo "<a href='logout.php'>Logout</a>";
	 
	} else {
	//3.2 When the user visits the page first time, simple login form will be displayed.
	}
 ?>