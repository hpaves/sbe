		<?php require 'sessioncheck.php'; ?>
		<?php include 'menu.php'; ?>
		<?php include 'mysql_credentials.php'; ?>

		<?php 

		$connect = mysqli_connect($host, $user, $pass, $db);
		    mysqli_query($connect, "SET CHARACTER SET UTF8") or
		        die("Error, ei saa andmebaasi charsetti seatud");

		if (isset($_POST['delete'])){ /* Trükitähtedes kommenteeritud keeruline osa pärineb: http://stackoverflow.com/questions/23987602/deleting-mysql-rows-with-checkbox */
		    $checkbox = $_POST['checkbox'];
		    $count = count($checkbox);
		    $deletioncounter = 0;

		    for($i=0;$i<$count;$i++){

		        if(!empty($checkbox[$i])){ /* CHECK IF CHECKBOX IS CLICKED OR NOT */

		        $id = mysqli_real_escape_string($connect,$checkbox[$i]); /* ESCAPE STRINGS */

		        $result = mysqli_query($connect,"SELECT Pildinimi FROM hp_test WHERE id = '$id'"); /* valib kustutamise jaoks objektina pildinime */
		        $imagetoerase = $result->fetch_assoc(); /* väljastab pildinime reana */

    			if (is_file("images/" . htmlspecialchars($imagetoerase['Pildinimi']))){
					unlink("images/" . htmlspecialchars($imagetoerase['Pildinimi']));
				} /* väljastab pildinime sõnena ja kustutab selle järgi pildi */

		        mysqli_query($connect,"DELETE FROM hp_test WHERE id = '$id'"); /* EXECUTE QUERY AND USE ' ' (apostrophe) IN YOUR VARIABLE */
		        $deletioncounter = $deletioncounter + 1;

		        } /* END OF IF NOT EMPTY CHECKBOX */

		    } /* END OF FOR LOOP */

		    echo "<h2 class='text-center'>Kustutati $deletioncounter kirjet.</h2>";

		} /* END OF ISSET DELETE */

		$query = "SELECT * FROM hp_test"; /* SELECT FROM THE TABLE */
		$result = mysqli_query($connect,$query); /* EXECUTE QUERY */

		echo "<form action='?p=remove' method='POST'>"; /* SUBMIT PAGE ON ITSELF */

		while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

		    $id=mysqli_real_escape_string($connect,$row['id']);
		    echo "<div class='tableblob'><table class='table table-striped'><tr>";
		    echo "<td class='d-inline-block col-2'>" . htmlspecialchars($row['Nimetus']) . '</td>';
		    echo nl2br("<td class='d-inline-block col-5'>" . htmlspecialchars($row['Kirjeldus']) . '</td>');
		    echo "<td class='d-inline-block col-1 text-center'>" . htmlspecialchars($row['Hind']) . ' €' . '</td>';
		    echo "<td class='d-inline-block col-3'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt=' " . htmlspecialchars($row["id"]) . " '></td>";
		    echo "<td class='d-inline-block col-1 text-center'><input type='checkbox' name='checkbox[]' value='$id'>";
		    echo "</tr></table></div>";

		}
	    mysqli_close($connect);

	    echo '<br><div class="text-center">
				<input class="text-center btn btn-danger" name="delete" type="SUBMIT" id="delete" value="Kustuta valitud!">
			</div>
	    </form>';

		 ?>