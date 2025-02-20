<?php
include 'db_config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM customer_feedback WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $message = $_POST["message"];
    $sql = "UPDATE customer_feedback SET message='$message' WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "Feedback updated!";
    }
}
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <textarea name="message"><?php echo $row['message']; ?></textarea>
    <button type="submit">Update</button>
</form>
