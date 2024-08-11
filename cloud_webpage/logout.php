<?php
include 'header.php';
include 'db.php';

// Start the session
session_start();

// Get the user ID from the session
$user_id = $_SESSION['user_id']; // Ensure 'user_id' is set during login

// Check if user ID exists
if (isset($user_id)) {
    // Prepare and execute SQL statement to delete user information
    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        // Destroy the session to log out the user
        session_destroy();

        // Redirect to home or login page
        header('Location: index.php');
        exit();
    } else {
        echo "<div class='container'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
} else {
    // If no user ID is found in session, log out without deleting information
    session_destroy();
    header('Location: index.php');
    exit();
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

    .container p {
        color: #333333;
        font-size: 1.2em;
    }

    .container a {
        color: #007BFF;
        text-decoration: none;
    }

    .container a:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <h2>Log Out</h2>
    <p>You have been successfully logged out and your information has been deleted.</p>
    <p><a href="index.php">Return to Home</a></p>
</div>
</body>
</html>
