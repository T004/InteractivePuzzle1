<!DOCTYPE html>
<html>
<head>
	<style>
        body {
	margin: 0;
	padding: 0;
	background-color: #f2f2f2;
	font-family: sans-serif;
}

.signup-box {
	width: 320px;
	height: 470px;
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

.signup-box label {
	margin: 0;
	padding: 0;
	font-weight: bold;
	display: block;
}

.signup-box input {
	width: 100%;
	margin-bottom: 20px;
}

.signup-box input[type="text"], input[type="password"] {
	border: none;
	border-bottom: 1px solid #000000;
	background: transparent;
	outline: none;
	height: 40px;
	color: #000000;
	font-size: 16px;
}

.signup-box input[type="submit"] {
	border: none;
	outline: none;
	height: 40px;
	background: #4CAF50;
	color: #ffffff;
	font-size: 18px;
	border-radius: 20px;
}

.signup-box input[type="submit"]:hover {
	cursor: pointer;
	background: #1E8449;
	color: #ffffff;
}

    </style>
    
</head>
<body>
	<div class="signup-box">
		<h2>Sign Up Here</h2>
		<form action="signup.php" method="POST">
			<label>Name</label>
			<input type="text" name="name" placeholder="Enter Name" required>
			<label>Email</label>
			<input type="text" name="email" placeholder="Enter Email" required>
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="signup" value="Sign Up">
		</form>
		<p>Already have an account? <a href="login.php">Login here</a></p>
	</div>
</body>
</html>

<?php
	session_start();
	$error = '';
	if (isset($_POST['signup'])) {
		if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Please fill in all the details";
		} else {
			// Define $name, $email and $password
			$name = $_POST['name'];
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
			// Check if email already exists in the database
			$sql = "SELECT * FROM record WHERE email = '$email'";
			$result = mysqli_query($conn, $sql
		if (mysqli_num_rows($result) > 0) {
				$error = "Email already exists";
			} else {
				// Insert user details into the database
				$sql = "INSERT INTO record (name, email, password) VALUES ('$name', '$email', '$password')";
				if (mysqli_query($conn, $sql)) {
					$_SESSION['name'] = $name;
					header("location: welcome.php");
				} else {
					$error = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		}
	}
?>
