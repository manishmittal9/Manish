<?php

$host = "localhost";
$user = "root";
$passwd = "";
$db_name="carparklane";

$conn = mysqli_connect($host,$user,$passwd,$db_name);

if (mysqli_connect_errno()){
	echo"Failed to connect to MySQL: " . mysqli_connect_error();
}
?>