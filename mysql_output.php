<?php 
	include 'mysql_connect.php';

	$l = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($l, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud");

    $sql = "SELECT * FROM hp_test";
	$result = $l->query($sql);
		
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. "; Nimetus: " . $row["Nimetus"]. "; Kirjeldus: " . $row["Kirjeldus"] . "; Hind: " . $row["Hind"] . "<br />";
        }
    } else {
        echo "0 results";
    }
	
    mysqli_close($l);
?>
