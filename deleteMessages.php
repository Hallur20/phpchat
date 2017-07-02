<?php

$psw = "hey";
$upsw=filter_input(INPUT_POST, 'psw');

define('db_user', 'hallur');
define('db_password', '123');
define('db_host', '207.154.200.197');
define('db_name', 'refresh');

$dbc = mysqli_connect(db_host, db_user, db_password, db_name)
        or die('could not connect to mysql' . mysqli_connect_error());

if ($upsw == $psw) {
    $query = "TRUNCATE TABLE refresh.msg";
    $stmt = mysqli_prepare($dbc, $query) or ( mysqli_error($con));
    $stmt->execute();
    echo "<script>alert('correct password! messages have been deleted.');</script>";
    include 'index.php';
} else {
    echo "<script>alert('wrong password');</script>";
    include 'index.php';
}
