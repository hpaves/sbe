<?php require 'sessioncheck.php'; ?>
<?php include 'menu.php'; ?>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 col-sm-offset-4">
				<form enctype="multipart/form-data" action="?p=upload" method="POST">
					<label>Toote nimetus:</label>
					<input class="form-control" type="text" name="Nimetus" maxlength="255" required><br>
					<label>Kirjeldus: </label><br>
					<textarea class="form-control" name="Kirjeldus"></textarea><br>
					<label>Hind:</label><br>
					<input class="form-control" type="number" name="Hind" min="0" required><br>
					<input type="file" class="form-control" name="pilt" /><br><br>
					<button type="submit" class="btn btn-primary" >Lisa toode!</button>
				</form>
			</div>
		</div>