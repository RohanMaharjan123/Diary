<?php
require_once "assets/php/connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (name, username, email, password)VALUES (:name, :username, :email, :password)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        session_start();
        $_SESSION["user"] = $username;
        echo "<h2>Registration Successful</h2>";
        echo "Thank you for registering, " . $name . "!<br>";
        echo "You'll be redirected to the login page in 3 seconds";
        header("refresh:3;url=index.php");
    }
    ?>


    <div class="container">
        <h1>Registration Page</h1>
        <form method="post" action="registration.php">
            <label for="name">
                Name:
            </label>
            <input type="text" id="name" name="name" required>

            <label for="username">
                Username:
            </label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </form>
        <p> Already have an account?</p>
        <a href="index.php">Click Here</a>
    </div>
    <br>
</body>

</html>