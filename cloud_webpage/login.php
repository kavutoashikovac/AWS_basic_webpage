<?php
include 'header.php';
include 'db.php';

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare and execute SQL statement
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Store user_id in session
        $_SESSION['user_id'] = $user['user_id'];

        echo "<div class='container'>Login successful!</div>";
        echo "<div class='container'><a href='game.php' class='button-link'>Go to Game List</a></div>";
    } else {
        echo "<div class='container'>Invalid credentials</div>";
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
    }

    .container label {
        display: block;
        margin: 10px 0 5px;
    }

    .container input[type="text"],
    .container input[type="password"] {
        width: 90%;
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

    .button-link {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #007BFF;
        text-decoration: none;
        border-radius: 4px;
        cursor: pointer;
        border: none;
    }

    .button-link:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
