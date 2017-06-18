<?php require 'sessioncheck.php'; ?>
<?php 
	echo "<p>Andmebaasi ei lisatud midagi.</p>";
?>

<div class="center">
	<button onclick="goBack()" class="text-center btn btn-primary">Mine tagasi</button>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>
