<?php

$username = "root";
$servername = "localhost";
$password = "";
$dbname = "depportal";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connectin failed".mysqli_connect_error());
}
