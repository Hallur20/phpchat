<?php
session_start();
$_SESSION["name"] = filter_input(INPUT_POST, 'name');
header("Location: index.php");
die();