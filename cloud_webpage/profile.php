<?php
include 'header.php';
include 'db.php';

// Start the session
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<div class='container'>Please log in to view your profile.</div>";
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Prepare and execute SQL statement to fetch user data
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = $conn->query($sql);

// Fetch user data
$user = $result->fetch_assoc();
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
</style>

<div class="container">
    <h2>Profile</h2>
    <?php if ($user): ?>
        <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <?php else: ?>
        <p>No user data found. It seems like your information has been deleted.</p>
    <?php endif; ?>
</div>
</body>
</html>
