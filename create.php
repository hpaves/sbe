<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>

	<body>
		<h1>Simple Back End</h1>
		<?php include 'menu.php'; ?>
		
		<div class="form">
			<form enctype="multipart/form-data" action="mysql_create.php" method="POST">
				<label>Toote nimetus:</label>
				<input class="form" type="text" name="Nimetus" required><br>
				<label>Kirjeldus: </label><br>
				<textarea class="form" name="Kirjeldus"></textarea><br>
				<label>Hind:</label><br>
				<input class="form" type="number" name="Hind" required><br>
				<input type="file" name="pilt" /><br><br>
				<button type="submit">Lisa toode!</button>
			</form>
		</div>
		
		<?php include 'validator.php'; ?>
	</body>
</html>