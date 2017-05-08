<?php 
require_once 'head.php';


if (!empty($_GET["p"])) {
    $page = $_GET["p"];
} else {
    $page = "create";
}

switch ($page) {
	case 'add':
		require("add.php");
		break;
	case 'upload':
		require("upload.php");
		break;
	case 'remove':
		require("remove.php");
		break;
	default:
		require("add.php");
		break;
}

require_once 'foot.php'; 
?>