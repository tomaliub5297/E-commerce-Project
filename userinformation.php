<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "userdata";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

$user = $_POST['user'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO `userinfodata`(`user`, `email`, `message`) VALUES ('$user','$email','$message')";

mysqli_query($con,$query);

echo "MESSAGE IS SENT";


?>