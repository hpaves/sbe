<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>

	<body>
		<h1>Simple Back End</h1>
		<?php include 'menu.php'; ?>
		<?php include 'mysql_credentials.php'; ?>

		<?php 

		$connect = mysqli_connect($host, $user, $pass, $db);
		    mysqli_query($connect, "SET CHARACTER SET UTF8") or
		        die("Error, ei saa andmebaasi charsetti seatud");

		if (isset($_POST['delete'])){ /* Kommenteeritud keeruline osa pärineb: http://stackoverflow.com/questions/23987602/deleting-mysql-rows-with-checkbox */
		    $checkbox = $_POST['checkbox'];
		    $count = count($checkbox);

		    for($i=0;$i<$count;$i++){

		        if(!empty($checkbox[$i])){ /* CHECK IF CHECKBOX IS CLICKED OR NOT */

		        $id = mysqli_real_escape_string($connect,$checkbox[$i]); /* ESCAPE STRINGS */
		        mysqli_query($connect,"DELETE FROM hp_test WHERE id = '$id'"); /* EXECUTE QUERY AND USE ' ' (apostrophe) IN YOUR VARIABLE */

		        } /* END OF IF NOT EMPTY CHECKBOX */

		    } /* END OF FOR LOOP */

		} /* END OF ISSET DELETE */

		$query = "SELECT * FROM hp_test"; /* SELECT FROM THE TABLE */
		$result = mysqli_query($connect,$query); /* EXECUTE QUERY */

		echo "<form action='delete.php' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

		while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

		    $id=mysqli_real_escape_string($connect,$row['id']);
		    echo "<div class='tableblob'><table><tr>";
		    echo "<td class='nimetus'>" . htmlspecialchars($row['Nimetus']) . '</td>';
		    echo "<td class='kirjeldus'>" . htmlspecialchars($row['Kirjeldus']) . '</td>';
		    echo "<td class='hind'>" . htmlspecialchars($row['Hind']) . ' €' . '</td>';
		    echo "<td class='pilt'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt=' " . htmlspecialchars($row["id"]) . " '></td>";
		    echo "<td class='id'>" . htmlspecialchars($row["id"]) . "</td>";
		    echo "<td class='linnuke'><input type='checkbox' name='checkbox[]' value='$id'>";
		    echo "</tr></table></div>";

		}
	    mysqli_close($connect);

	    echo '<br>
	    <input name="delete" type="SUBMIT" id="delete" value="Kustuta valitud!">
	    </form>';

		 ?>

		<?php include 'validator.php'; ?>
	</body>
</html>