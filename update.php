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
		    echo "<div class='tableblob'><table class='table table-striped'><tr>";
		    echo "<td class='d-inline-block col-2'>" . htmlspecialchars($row['Nimetus']) . '</td>';
		    echo nl2br("<td class='d-inline-block col-5'>" . htmlspecialchars($row['Kirjeldus']) . '</td>');
		    echo "<td class='d-inline-block col-1 text-center'>" . htmlspecialchars($row['Hind']) . ' €' . '</td>';
		    echo "<td class='d-inline-block col-3'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt=' " . htmlspecialchars($row["id"]) . " '></td>";
		    echo "<td class='d-inline-block col-1 text-center'><input type='radio' name='checkbox[]' value='$id'>";
		    echo "</tr></table></div>";

		}
	    mysqli_close($connect);

	    echo '<br><div class="text-center">
				<input class="text-center btn btn-primary" name="update" type="SUBMIT" id="update" value="Muuda valitud toodet!">
			</div>
	    </form>';

		 ?>