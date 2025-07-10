<?php
include 'db.php';

$name = $_POST['name'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$phone = $_POST['phone'];

$sql = "INSERT INTO orders (name, item, quantity, phone) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $name, $item, $quantity, $phone);

if ($stmt->execute()) {
    echo "<h2>✅ Order placed successfully!</h2><p><a href='order.html'>Back to Order Page</a></p>";
} else {
    echo "<h2>❌ Error placing order: " . $conn->error . "</h2>";
}

$conn->close();
?>

