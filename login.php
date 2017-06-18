<?php session_start(); //Start the Session

	require('mysql_credentials.php');

	$connect = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($connect, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud.");
	// kasutatud koodijupid ja loogika: http://codingcyber.com/simple-login-script-php-and-mysql-64
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if (isset($_POST['username']) and isset($_POST['password'])){
	//3.1.1 Assigning posted values to variables.
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		$salt = 'kalakalakalakala'; // pole ilmselt parim praktika
		$passwordSalted = $password . $salt;
		$passwordHash = sha1($passwordSalted);
		//3.1.2 Checking the values are existing in the database or not
		$query = "SELECT * FROM hp_users WHERE username='$username' and passw='$passwordHash'";
		 
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
			if ($count == 1){
			$_SESSION['username'] = $username;
			} else {
			//3.1.3 If the login credentials doesn't match:
			$message = "Vale kasutajanimi või parool.";
			}
	}
	//3.1.4 if the user is logged in...
	if (isset($_SESSION['username'])){
	$username = mysqli_real_escape_string($connect, $_SESSION['username']);
	header("Location: ?p=view");
	 
	} else { 

?>
<div class="text-center"><h1 class="branding">Simple Back End</h1></div>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 col-sm-offset-4">
		<form action="?p=login" method="post">
			<input class="form-control" type="text" name="username" placeholder="kasutajanimi" /><br />
			<input class="form-control" type="password" name="password" placeholder="parool" /><br />
			<input type="submit" class="btn btn-secondary" value="Logi sisse" name="submit"/>
		</form>
	</div>
</div>
<?php

	}
 
?>