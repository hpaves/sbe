<form enctype="multipart/form-data" action="mysql_create.php" method="POST">
	<input type="text" name="Nimetus" placeholder="Toote nimetus" required><br />
	<textarea name="Kirjeldus" placeholder="Mõni sõna toote kohta"></textarea><br />
	<input type="Number" name="Hind" placeholder="€ (ära sente pane)" required><br/>
	<input type="file" name="pilt" /><br/>
	<button type="submit">Lae üles!</button><br/>
</form>
<br/><br/>