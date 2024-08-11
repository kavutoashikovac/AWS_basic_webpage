<?php
include 'header.php';
include 'db.php';

// Start the session
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<div class='container'>Please log in to place an order.</div>";
    exit();
}

// Get the game ID from the URL
$game_id = isset($_GET['game_id']) ? intval($_GET['game_id']) : 0;

// Ensure the game ID is valid
if ($game_id <= 0) {
    echo "<div class='container'>Invalid game ID.</div>";
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch the game price
$sql = "SELECT price FROM games WHERE game_id='$game_id'";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    echo "<div class='container'>Game not found.</div>";
    exit();
}

$game = $result->fetch_assoc();
$price = $game['price'];

// Insert order
$sql = "INSERT INTO orders (user_id, total) VALUES ('$user_id', '$price')";
if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id; // Get the last inserted order ID

    // Insert order item
    $sql = "INSERT INTO order_items (order_id, game_id, quantity, price) VALUES ('$order_id', '$game_id', 1, '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'>Item ordered successfully!</div>";
    } else {
        echo "<div class='container'>Error: " . $conn->error . "</div>";
    }
} else {
    echo "<div class='container'>Error: " . $conn->error . "</div>";
}

// Close the database connection
$conn->close();
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
</style>

<div class="container">
    <h2>Order Status</h2>
    <!-- Confirmation message is displayed above -->
</div>
</body>
</html>
