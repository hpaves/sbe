<?php require 'sessioncheck.php'; ?>
<?php
	include 'mysql_credentials.php';

	$connect = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($connect, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud.");

	$Nimetus = mysqli_real_escape_string($connect, $_REQUEST['Nimetus']);
	$Kirjeldus = mysqli_real_escape_string($connect, $_REQUEST['Kirjeldus']);
	$Hind = mysqli_real_escape_string($connect, $_REQUEST['Hind']);
	$Pildinimi = mysqli_real_escape_string($connect, $_FILES['pilt']["name"]);
	$sql = "INSERT INTO hp_test (Nimetus, Kirjeldus, Hind, Pildinimi) VALUES ('$Nimetus', '$Kirjeldus', '$Hind', '$Pildinimi')";

    if (mysqli_query($connect, $sql)) {
		echo "<p>Kirje andmebaasi edukalt lisatud.</p>";
		} else {
			
		}
	mysqli_close($connect);
?>

<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='?p=add';
    }, 2000);
</script>