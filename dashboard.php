<?php
session_start();
if(!isset($_SESSION['name'])){
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
        .dashboard-box {
  width: 500px;
  margin: 100px auto;
  background: #fff;
  padding: 20px;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.dashboard-box h2 {
  margin-top: 0;
  color: #333;
}

.dashboard-box p {
  font-size: 18px;
  line-height: 1.5;
  color: #555;
}

.dashboard-box a {
  display: block;
  margin-top: 20px;
  color: #fff;
  background: #333;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
}

.dashboard-box a:hover {
  background: #666;
}

    </style>
</head>
<body>
	<div class="dashboard-box">
		<h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
		<p>You have successfully logged in to the dashboard.</p>
		<a href="index.html">Logout</a>
	</div>
</body>
</html>
