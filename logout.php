<?php
session_start();
session_destroy();
$rootfolder = file_get_contents('./rootfolder.txt', FILE_USE_INCLUDE_PATH);
header('Location: ' . $rootfolder . '');
?>