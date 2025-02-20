<?php
include 'db_config.php';

// Fetch menu items from the database
$sql = "SELECT * FROM menu";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Puloraca Fusion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Puloraca Fusion Menu</h1>
    </header>
    
    <div class="menu-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="menu-item">
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <span class="price">$<?php echo number_format($row['price'], 2); ?></span>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No menu items available.</p>
        <?php endif; ?>
    </div>

</body>
</html>