<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
        body {
	margin: 0;
	padding: 0;
	background-color: #f2f2f2;
	font-family: sans-serif;
}

.login-box {
	width: 320px;
	height: 400px;
	background: #ffffff;
	color: #000000;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -50%);
	box-sizing: border-box;
	padding: 70px 30px;
}

h2 {
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size: 22px;
}

.login-box label {
	margin: 0;
	padding: 0;
	font-weight: bold;
	display: block;
}

.login-box input {
	width: 100%;
	margin-bottom: 20px;
}

.login-box input[type="text"], input[type="password"] {
	border: none;
	border-bottom: 1px solid #000000;
	background: transparent;
	outline: none;
	height: 40px;
	color: #000000;
	font-size: 16px;
}

.login-box input[type="submit"] {
	border: none;
	outline: none;
	height: 40px;
	background: #4CAF50;
	color: #ffffff;
	font-size: 18px;
	border-radius: 20px;
}

.button:hover {
	cursor: pointer;
	background: #1E8449;
	color: #ffffff;
}

    
    </style>
</head>
<body>
	<div class="login-box">
		<h2>Login Here</h2>
		<form action="login.php" method="POST">
			<label>Email</label>
			<input type="text" name="email" placeholder="Enter Email" required>
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter Password" required>
			<button type="button" onclick="myFunction()" >SUBMIT</button>
		</form>
		<p>Don't have an account? <a href="signup.php">Sign up here</a></p>
	</div>
       <script>
    function myFunction() {
      window.open("dashboard.php");
    }
    </script>
</body>
</html>
<?php
	session_start();
	$error = '';
	if (isset($_POST['login'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Email or Password is invalid";
		} else {
			// Define $email and $password
			$email = $_POST['email'];
			$password = $_POST['password'];
			// Connect to the database
			$dbhost = 'sql205.epizy.com';
			$dbuser = 'epiz_34022686';
			$dbpass = 'QSFnz3NbI6C';
			$dbname = 'epiz_34022686_interactivepuzzle';
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			// Check if email and password match with the registered user's credentials
			$sql = "SELECT * FROM record WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1) {
				// If match found, redirect user to dashboard.php
				header("location: dashboard.php");
			}
			else {
				// If match not found, show error message and ask user to sign up
				$error = "Email or Password is invalid";
				echo "<script type='text/javascript'>alert('$error');window.location.href='signup.php';</script>";
			}
			mysqli_close($conn);
		}
	}
?>




