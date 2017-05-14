		<?php require 'sessioncheck.php'; ?>
		<?php include 'menu.php'; ?>
		<?php include 'mysql_credentials.php'; ?>

		<?php 

		$connect = mysqli_connect($host, $user, $pass, $db);
		    mysqli_query($connect, "SET CHARACTER SET UTF8") or
		        die("Error, ei saa andmebaasi charsetti seatud");

		if (isset($_POST['update'])){ /* Trükitähtedes kommenteeritud keeruline osa pärineb: http://stackoverflow.com/questions/23987602/deleting-mysql-rows-with-checkbox */
		    $checkbox = $_POST['checkbox'];
		    $count = count($checkbox);

		    for($i=0;$i<$count;$i++){

		        if(!empty($checkbox[$i])){ /* CHECK IF CHECKBOX IS CLICKED OR NOT */

		        $id = mysqli_real_escape_string($connect,$checkbox[$i]); /* ESCAPE STRINGS */

		        $result = mysqli_query($connect,"SELECT * FROM hp_test WHERE id = '$id'"); /* EXECUTE QUERY AND USE ' ' (apostrophe) IN YOUR VARIABLE */

        		echo "<div class='form'>
			<form enctype='multipart/form-data' action='?p=updatesubmit' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

			while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

			    $id=mysqli_real_escape_string($connect,$row['id']);

			    echo "<label>Toote nimetus:</label>";
			    echo "<input class='form' type='text' name='Nimetus' maxlength='255' required value='".htmlspecialchars($row['Nimetus'])."'><br>";

			    echo "<label>Kirjeldus: </label><br>";
			    echo "<textarea class='form' name='Kirjeldus'>".htmlspecialchars($row['Kirjeldus'])."</textarea><br>";

			    echo "<label>Hind:</label>";
			    echo "<input class='form' type='number' name='Hind' min='0' required value='".htmlspecialchars($row['Hind'])."'><br><br>";

			    echo "<div class='form'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt='" . htmlspecialchars($row["id"]) . " '></div><br>";

			    echo "<input type='hidden' name='id' value='".htmlspecialchars($row["id"])."'>";

			    echo "<button type='submit'>Uuenda kirjet!</button>
				</form>
			</div>";

			}

	    } /* END OF IF NOT EMPTY CHECKBOX */

	} /* END OF FOR LOOP */

}

?>