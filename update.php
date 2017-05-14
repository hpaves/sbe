		<?php require 'sessioncheck.php'; ?>
		<?php include 'menu.php'; ?>
		<?php include 'mysql_credentials.php'; ?>

		<?php 

		$connect = mysqli_connect($host, $user, $pass, $db);
		    mysqli_query($connect, "SET CHARACTER SET UTF8") or
		        die("Error, ei saa andmebaasi charsetti seatud");

		$query = "SELECT * FROM hp_test"; /* SELECT FROM THE TABLE */
		$result = mysqli_query($connect,$query); /* EXECUTE QUERY */

		echo "<form action='?p=updateform' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

		while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

		    $id=mysqli_real_escape_string($connect,$row['id']);
		    echo "<div class='tableblob'><table><tr>";
		    echo "<td class='nimetus'>" . htmlspecialchars($row['Nimetus']) . '</td>';
		    echo nl2br("<td class='kirjeldus'>" . htmlspecialchars($row['Kirjeldus']) . '</td>');
		    echo "<td class='hind'>" . htmlspecialchars($row['Hind']) . ' €' . '</td>';
		    echo "<td class='pilt'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt=' " . htmlspecialchars($row["id"]) . " '></td>";
		    echo "<td class='linnuke'><input type='radio' name='checkbox[]' value='$id'>";
		    echo "</tr></table></div>";

		}
	    mysqli_close($connect);

	    echo '<br><div class="center">
				<input class="center" name="update" type="SUBMIT" id="update" value="Muuda valitud toodet!">
			</div>
	    </form>';

		 ?>