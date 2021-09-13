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
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: tomalfarhan.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
			<div style="font-size: 40px;margin: 40px; color: darkblue;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click For New Signup</a><br><br>
		</form>
	</div>
</body>
</html>