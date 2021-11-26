<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "websieuthi";
$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_error()) {
	# code...
	echo "Connection_Fail: ".mysqli_connect_error();exit;
}

?>