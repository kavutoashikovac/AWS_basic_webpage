<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameNook</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <header>
        <nav>
            <button class="navbar-toggle" onclick="toggleMenu()">☰</button>
            <div class="navbar-menu">
                <a href="index.php">Home</a>
                <a href="game.php">Games</a>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>
    <script>
        function toggleMenu() {
            const menu = document.querySelector('.navbar-menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</body>
</html>


