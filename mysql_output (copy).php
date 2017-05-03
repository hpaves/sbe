<?php 
	include 'mysql_connect.php';

	$l = mysqli_connect($host, $user, $pass, $db);
	mysqli_query($l, "SET CHARACTER SET UTF8") or
		die("Error, ei saa andmebaasi charsetti seatud");

    $sql = "SELECT * FROM hp_test";
	$result = $l->query($sql);
		
    if ($result->num_rows > 0) {
        // output data of each row
        foreach ($result as $row): ?>
            <div id="ymbris">
            Nimetus: <?php echo htmlspecialchars($row["Nimetus"]) ?>
            Kirjeldus: <?php echo htmlspecialchars($row["Kirjeldus"]) ?>
            Hind: <?php echo htmlspecialchars($row["Hind"]) ?>
            <img src="images/<?php echo htmlspecialchars($row["Pildinimi"]) ?>">
        <?php endforeach;
    } else {
        echo "0 results";
    }
	
    mysqli_close($l);
?>
