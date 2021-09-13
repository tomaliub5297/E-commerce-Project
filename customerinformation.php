<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "customerinfo";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

$user = $_POST['user'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

$query = "INSERT INTO `userinfodata`(`user`, `email`,'number', `message`) VALUES ('$user','$email','$number''$message')";

mysqli_query($con,$query);

echo "MESSAGE IS SENT";


?>