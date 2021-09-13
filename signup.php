<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	body{
		background: url("image/back.png");
	}
	
	#text{

		height: 30px;
		border-radius: 10px;
		padding: 1px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		display: inline-block;
	    background: #EE9A4D;
	    color: #fff;
	    padding: 10px 40px;
	    margin: 35px 0;
	    border-radius: 30px;
	    transition: background o.1s;
	}
	#button:hover{
		background: #C19A6B;
	}

	#box{

		background-color: #82CAFF;
		margin: auto;
		width: 400px;
		padding: 50px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px;margin: 40px; color: darkblue;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>