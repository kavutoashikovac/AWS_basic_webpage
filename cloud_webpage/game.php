<?php
include 'header.php';
include 'db.php';

// Prepare and execute SQL statement to fetch all games
$sql = "SELECT * FROM games";
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
    echo "<div class='container'>Query Error: " . $conn->error . "</div>";
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

    .game-list {
        list-style-type: none;
        padding: 0;
    }

    .game-item {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
        color: #333;
    }

    .game-item h3 {
        color: #007BFF;
    }

    .game-item p {
        margin: 5px 0;
    }

    .buy-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #007BFF;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .buy-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Game List</h2>
    <?php if ($result->num_rows > 0): ?>
        <ul class="game-list">
            <?php while ($game = $result->fetch_assoc()): ?>
                <li class="game-item">
                    <h3><?php echo htmlspecialchars($game['title']); ?></h3>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($game['description']); ?></p>
                    <p><strong>Price:</strong> $<?php echo number_format($game['price'], 2); ?></p>
                    <p><strong>Release Date:</strong> <?php echo htmlspecialchars($game['release_date']); ?></p>
                    <a href="buy.php?game_id=<?php echo $game['game_id']; ?>" class="buy-button">Buy</a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>
</div>
</body>
</html>
