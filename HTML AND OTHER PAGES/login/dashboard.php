<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

// Define the homepage path (adjust according to your directory structure)
$homepage = "../../index.php";  // This goes up two directories to reach index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Puloraca Fusion</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        .welcome-message {
            text-align: center;
            padding: 50px;
        }
    </style>
    <script>
        // Redirect to homepage after 2 seconds
        setTimeout(function() {
            window.location.href = '<?php echo $homepage; ?>';
        }, 2000);
    </script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <a href="<?php echo $homepage; ?>" class="logo">
                    <img src="logopuloraca.jpg" alt="Puloraca Fusion Logo" class="logo-image">
                </a>
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="welcome-message">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>Redirecting you to homepage...</p>
        </div>
    </main>
</body>
</html>