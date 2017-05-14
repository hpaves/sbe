		<?php require 'sessioncheck.php'; ?>
		<?php include 'menu.php'; ?>
		<?php include 'mysql_credentials.php'; ?>

		<?php 

		$connect = mysqli_connect($host, $user, $pass, $db);
		    mysqli_query($connect, "SET CHARACTER SET UTF8") or
		        die("Error, ei saa andmebaasi charsetti seatud");
		
		$query = "SELECT * FROM hp_test"; /* SELECT FROM THE TABLE */
		$result = mysqli_query($connect,$query); /* EXECUTE QUERY */

		while ($row = mysqli_fetch_array($result)){ /* FETCH ARRAY */

		    $id=mysqli_real_escape_string($connect,$row['id']);
		    echo "<div class='tableblob'><table><tr>";
		    echo "<td class='nimetus'>" . htmlspecialchars($row['Nimetus']) . '</td>';
		    echo "<td class='kirjeldus'>" . htmlspecialchars($row['Kirjeldus']) . '</td>';
		    echo "<td class='hind'>" . htmlspecialchars($row['Hind']) . ' €' . '</td>';
		    echo "<td class='pilt'><img src='images/" . htmlspecialchars($row['Pildinimi']) . "' alt=' " . htmlspecialchars($row["id"]) . " '></td>";
		    echo "<td class='id'>" . htmlspecialchars($row["id"]) . "</td>";
		    echo "</tr></table></div>";

		}
	    mysqli_close($connect);

	    echo '<p class="center">Kui võrgurakendus tundub väga kole, siis see on mõeldud kasutamiseks back endina näiteks sellises kontekstis: <a href="http://enos.itcollege.ee/~hpaves/startbootstrap-creative-gh-pages/">http://enos.itcollege.ee/~hpaves/startbootstrap-creative-gh-pages/</a></p>
	    	<p>Antud näidislehe (mis pärineb <a href="https://blackrockdigital.github.io/startbootstrap-creative/">siit</a>) CSS vajab küll samade külgede vahekorraga pilte, kuid mõtte näitab ära.</p>
	    	<p>JS kasutus on täiesti minimaalne, sest JS ja PHP sidumise lahendusi me loengus ei käsitlenud ja üleüldse tundus see erinevaid näiteid uurides üks suur turvarisk.</p>';
		 ?>