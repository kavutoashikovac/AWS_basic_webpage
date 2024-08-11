<?php
include 'header.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'>Registration successful!</div>";
    } else {
        echo "<div class='container'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<style>
    .container {
        text-align: center;
        padding: 50px;
        background-color: #FFFFFF;
    }

    .container h2 {
        color: #007BFF;
        font-size: 2em;
        margin: 0;
    }

    .container form {
        display: inline-block;
        text-align: left;
        background-color: #F9F9F9;
        padding: 20px;
        border-radius: 8px;
    }

    .container label {
        display: block;
        margin: 10px 0 5px;
    }

    .container input[type="text"],
    .container input[type="password"],
    .container input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #CCCCCC;
        border-radius: 4px;
    }

    .container input[type="submit"] {
        background-color: #007BFF;
        color: #FFFFFF;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .container input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Register</h2>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>

