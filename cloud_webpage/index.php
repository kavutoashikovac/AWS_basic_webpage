<?php include 'header.php'; ?>
<style>

/* Apply fixed background image to the whole page */
body {
    margin: 0;
    padding: 0;
    background: url('image/bg.jpg') no-repeat center center fixed;
    background-size: cover; /* Ensure the image covers the entire background */
    color: #FFFFFF; /* Default text color */
}

/* Centering text container */
.container {
    text-align: center;
    padding: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* Heading styling */
.container h1 {
    color: #007BFF; /* Blue text color */
    font-size: 2.5em;
    margin: 0;
}

/* Paragraph styling */
.container p {
    color: #FFFFFF; /* White text color */
    font-size: 1.2em;
    font-weight: bold;
}

     
    /* Responsive image styling */
    .responsive-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 20px auto; /* Center the image horizontally */
    }

    /* Footer Styles */
    .footer {
        background-color: #007BFF;
        color: #FFFFFF;
        text-align: center;
        padding: 20px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
<div class="container">
    <h1>Welcome to GameNook</h1>
    <p>Your one-stop shop for the best video games!</p>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> GameNook. All rights reserved.</p>
</div>

</body>
</html>
