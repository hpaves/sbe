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
		require("img_upload.php");
		break;
	case 'view':
		require("view.php");
		break;
	case 'remove':
		require("remove.php");
		break;
	case 'login':
		require("login.php");
		break;
	case 'logout':
		require("logout.php");
		break;
	default:
		require("login.php");
		break;
}

require_once 'foot.php'; 
?>