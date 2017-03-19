<?php 
	include 'mysql_connect.php';

	$l = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($l, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud");

	$Nimetus = mysqli_real_escape_string($l, $_REQUEST['Nimetus']);
	$Kirjeldus = mysqli_real_escape_string($l, $_REQUEST['Kirjeldus']);
	$Hind = mysqli_real_escape_string($l, $_REQUEST['Hind']);
	$sql = "INSERT INTO hp_test (Nimetus, Kirjeldus, Hind) VALUES ('$Kirjeldus', '$Kirjeldus', '$Hind')";

    if (mysqli_query($l, $sql)) {
		echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($l);
		}
	mysqli_close($l);
?>
