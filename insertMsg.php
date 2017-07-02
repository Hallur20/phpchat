<?php
session_start();
$name=$_SESSION['name'];
$msg=filter_input(INPUT_POST, 'msg');
$wholeMessage="{$name}: $msg";
define('db_user', 'hallur');
define('db_password', '123');
define('db_host', '207.154.200.197');
define('db_name', 'refresh');

$dbc = mysqli_connect(db_host, db_user, db_password, db_name)
        or die('could not connect to mysql' . mysqli_connect_error());

$query = "insert into msg()values(?);";
$stmt = mysqli_prepare($dbc, $query) or ( mysqli_error($con));
$stmt->bind_param('s', $message);
$message = $wholeMessage;
$stmt->execute();
header("Location: index.php");
die();
