<!DOCTYPE html>
<html>
	<head>
		<title>Simple Back End</title>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<h1>Simple Back End</h1>
		
		<div class="form">
			<?php include 'form.php'; ?>
			<br /><br />
		</div>
		
		<?php include 'mysql_output.php'; ?>

		<p>
		 <a href="http://validator.w3.org/check?uri=referer">
		  <img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
		 </a>
		</p>

		<p>
		<a href="http://jigsaw.w3.org/css-validator/check/referer">
		    <img style="border:0;width:88px;height:31px"
			src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
			alt="Valid CSS!" />
		    </a>
		</p>
     
		<p><?php echo 'PHP versioon: ' . phpversion(); ?></p>
	</body>
</html>
