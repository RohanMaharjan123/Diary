<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<link rel="stylesheet"
		type="text/css"
		href="assets/styles/style.css">
</head>

<body>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Connect to the database
	$host = "localhost";
	$dbname = "db_ediary";
	$username_db = "root";
	$password_db = "";

	try {
		$db = new PDO("mysql:host=$host;dbname=$dbname",$username_db,$password_db);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Check if the user exists in the database
		$stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user) {
			// Verify the password
			if (password_verify($password, $user["password"])) {
				
				$_SESSION["user"] = $user;

				echo '<script type="text/javascript">
	window.onload = function () {
		alert("Welcome to E-diary");
		window.location.href = "diary.php";
	};
</script>
';
			} else {
				echo "<h2>Login Failed !!</h2>";
				echo "Invalid username or password.";
			}
		} else {
			echo "<h2>Login Failed !!</h2>";
			echo "User doesn't exist";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
?>

	<div class="container">
		<h1>Login Page</h1>
		<form method="post" action="">
			<label for="username">Username:</label>
			<input type="text"
				id="username"
				name="username" required>

			<label for="password">Password:</label>
			<input type="password"
				id="password"
				name="password" required>

			<input type="submit"
				value="Login">
		</form>
		<br><br>
		<p> Don't have an account?
			<a href="registration.php">Click Here</a>
		</p>
	</div>
</body>

</html>
