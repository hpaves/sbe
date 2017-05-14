<?php require 'sessioncheck.php'; ?>
<?php
	include 'mysql_credentials.php';

	$connect = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($connect, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud.");

	$id = mysqli_real_escape_string($connect, $_REQUEST['id']);
	$Nimetus = mysqli_real_escape_string($connect, $_REQUEST['Nimetus']);
	$Kirjeldus = mysqli_real_escape_string($connect, $_REQUEST['Kirjeldus']);
	$Hind = mysqli_real_escape_string($connect, $_REQUEST['Hind']);
	$sql = "UPDATE `hp_test` SET `Nimetus`='$Nimetus',`Kirjeldus`='$Kirjeldus',`Hind`=$Hind WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
		echo "<p>Kirje andmebaasi edukalt lisatud.</p>";
		} else {
			
		}
	mysqli_close($connect);
?>

<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='?p=update';
    }, 2000);
</script>